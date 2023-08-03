<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\Bulk;
use App\Mail\Loan as MailLoan;
use App\Mail\Purchase as MailPurchase;
use App\Mail\Quote as MailQuote;
use App\Mail\Tradein;
use App\Models\Loan;
use App\Models\Maillist;
use App\Models\Messages;
use App\Models\Partner;
use App\Models\Purchase;
use App\Models\Quote;
use App\Models\Services;
use App\Models\Social;
use App\Models\Tradein as ModelsTradein;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('contact','socials');
        $this->service = new Services();
        $this->maillist = new Maillist();
        $this->message = new Messages();
        $this->visit =new Visit();
        $this->user =new User();
        $this->purchase = new Purchase();
        $this->tradein = new ModelsTradein();
        $this->quote = new Quote();
        $this->loan = new Loan();
        $this->partner = new Partner();
        $this->user = new User();
    }

    public function index()
    {
        return view('settings.index');
    }

    public function services()
    {
        $services = $this->service->get();
        return json_encode($services);
    }

    function contact() {
        $phones = Social::where('name','phone')->get();
        $address = Social::where('name', 'address')->first();
        $emails = Social::where('name', 'email')->get();
        $socials = Social::where('type','social')->get();
        return view('contact', compact('phones','address', 'emails', 'socials'));
    }

    public function socials($id = null)
    {
        $query = Social::query();
        if (!is_null($id)) {
            $query->where('id',$id);
        }
        $socials = $query->get();

        return json_encode($socials);
    }

    public function socialStore(Request $request)
    {
        if (!is_null($request->social_id)) {
            $social = Social::find($request->social_id);
            $social->update(['type'=>$request->type,'name' => $request->name, 'link' => $request->link]);
            $message = 'Social updated successfully';
        } else {
            $social = Social::create(['type' => $request->type, 'name' => $request->name, 'link' => $request->link]);
            $message = 'Social created successfully';
        }
        return json_encode(['status' => 'success', 'message' => $message]);
    }

    public function webtraffic($date = null)
    {
        $data = collect();
        $date = $date ?? date('Y-m-d');
        for ($hour = 0; $hour <= 24; $hour++) {
            $startTime = $date.' '.sprintf('%02d:00:00', $hour);
            $endTime = $date . ' ' . sprintf('%02d:59:59',
                $hour
            );
            $visits = DB::select("SELECT COUNT(1) AS count FROM visits WHERE `created_at` BETWEEN '$startTime' AND '$endTime'");
            $data->push(['hour'=>$hour,'start'=> $startTime,'end'=>$endTime, 'visits'=>$visits[0]->count]);
        }
        return json_encode($data);
    }

    public function mails($id = null)
    {
        $query = $this->maillist->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $mails = $query->get();

        return json_encode($mails);
    }

    public function mailCreate(MailRequest $request)
    {
        $validated = $request->validated();

        if (!is_null($validated["mail_id"])) {
            $mail = $this->maillist->find($validated["mail_id"]);
            $mail->update($validated);
            $message = "Mail updated successfully";
        } else {
            $mail = $this->maillist->create($validated);
            $message = "Mail added successfully";
        }

        return json_encode(['status' => "success", "message" => $message]);
    }

    public function loanMessage(Request $request) {
        $request->user()->email = "magaben33@gmail.com";
        $subject = 'Loan Application Follow Up Email';
        $loan = $this->loan->with('vehicle')->findOrFail($request->loan_request_id);
        if (!is_null($loan->email)) {
            Mail::to($loan->email, $loan->name)->send(new MailLoan($loan, $subject, $request->message));
        }
        return redirect()->back()->with('success','Message sent successfully.');
    }

    public function saleMessage(Request $request) {
        $request->user()->email = "magaben33@gmail.com";
        $subject = 'Purchase Request Follow Up Email';
        $purchase = $this->purchase->with('vehicle')->findOrFail($request->sale_request_id);
        if (!is_null($purchase->email)) {
            Mail::to($purchase->email, $purchase->name)->send(new MailPurchase($purchase,$subject,$request->message));
        }
        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function tradeinMessage(Request $request) {
        $request->user()->email = "magaben33@gmail.com";
        $subject = 'Trade In Request Follow Up Email';
        $tradein = $this->tradein->with('vehicle')->findOrFail($request->tradein_request_id);
        if (!is_null($tradein->email)) {
            Mail::to($tradein->email, $tradein->name)->send(new Tradein($tradein, $subject, $request->message));
        }
        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function quoteMessage(Request $request) {
        $request->user()->email = "magaben33@gmail.com";
        $subject = 'Quote Request Follow Up Email';
        $quote = $this->quote->with('vehicle')->findOrFail($request->quote_request_id);
        if (!is_null($quote->email)) {
            Mail::to($quote->email, $quote->name)->send(new MailQuote($quote, $subject, $request->message));
        }
        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function message(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'max:60'],
            'phone' => ['required', 'max:16'],
            'subject' => ['required','max:150'],
            'message' => ['required','max:255'],
        ]);
        $this->message->create($validated+['type'=>'contact']);
        return json_encode(['status'=>'success', 'message'=>'Your message was received successfully. We will check your issue and get back to you as appropriate']);
    }

    public function bulkMail(Request $request) {
        if ($request->sendrange == "manual") {
            if (count($request->users) > 0) {
                foreach ($request->users as $value) {
                    $user = $this->user->find($value);
                    Mail::to($user,$user->name)->queue(new Bulk($request->subject, $request->message));
                }
            }else {
                return json_encode(['status'=>"error", 'message'=>"No users selected to email"]);
            }
        }else {
            if ($request->recepient_type === "customers") {
                $emails =  $this->user->where('role','<>','admin')->pluck('email');
                Mail::to($emails)->queue(new Bulk($request->subject, $request->message));
            }
            if ($request->recepient_type === "partners") {
                $emails =  $this->partner->pluck('email');
                Mail::to($emails)->queue(new Bulk($request->subject, $request->message));
            }
        }
        
    }

    public function visits($date) {
        $visits = $this->visit->whereDate('created_at',$date)->latest()->get();
        return json_encode($visits);
    }

}
