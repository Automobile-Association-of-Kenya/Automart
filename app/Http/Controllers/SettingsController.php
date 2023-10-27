<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\Bulk;
use App\Mail\Contact;
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
        $this->middleware('auth')->except('contact','socials', 'message');
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
        $this->social = new Social();
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
        // return $socials;
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
        $subject = 'Loan Application Follow Up Email';
        $loan = $this->loan->with('vehicle')->findOrFail($request->loan_request_id);
        if (!is_null($loan->email)) {
            Mail::to($loan->email, $loan->name)->send(new MailLoan($loan, $subject, $request->message));
        }
        return redirect()->back()->with('success','Message sent successfully.');
    }

    public function saleMessage(Request $request) {
        $subject = 'Purchase Request Follow Up Email';
        $purchase = $this->purchase->with('vehicle')->findOrFail($request->sale_request_id);
        if (!is_null($purchase->email)) {
            Mail::to($purchase->email, $purchase->name)->send(new MailPurchase($purchase,$subject,$request->message,$this->replyemail(),$this->replyname()));
        }
        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function replyemail() {
        if (auth()->user()->role === "admin") {
            $email = "automart@aakenya.co.ke";
        } else {
            $email = auth()->user()->dealer?->email ?? auth()->user()->email;
        }
        return $email;
    }

    public function replyname() {
        if (auth()->user()->role === "admin") {
            $name = "Automart AA Kenya Limited";
        } else {
            $name = auth()->user()->dealer?->name ?? auth()->user()->name;
        }
        return $name;
    }

    public function tradeinMessage(Request $request) {
        $subject = 'Trade In Request Follow Up Email';
        $tradein = $this->tradein->with('vehicle')->findOrFail($request->tradein_request_id);
        if (!is_null($tradein->email)) {
            Mail::to($tradein->email, $tradein->name)->send(new Tradein($tradein, $subject, $request->message,$this->replyemail(),$this->replyname()));
        }
        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    public function quoteMessage(Request $request) {
        $subject = 'Quote Request Follow Up Email';
        $quote = $this->quote->with('vehicle')->findOrFail($request->quote_request_id);
        if (!is_null($quote->email)) {
            Mail::to($quote->email, $quote->name)->send(new MailQuote($quote, $subject, $request->message,$this->replyemail(),$this->replyname()));
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
        Mail::to('automart@aakenya.co.ke', 'Automart AA Kenya')->send(new Contact($validated["subject"], $validated["message"], $validated["email"],$validated["name"]));
        return json_encode(['status'=>'success', 'message'=>'Your message was received successfully. We will check your issue and get back to you as appropriate']);
    }

    public function bulkMail(Request $request) {

        $files = collect();
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move("attachments/", $fileName);
                $files->push($fileName);
            }
        }

        if ($request->sendrange == "manual") {
            if (count($request->users) > 0) {
                foreach ($request->users as $value) {
                    $user = $this->user->find($value);
                    Mail::to($user->email,$user->name)->send(new Bulk($request->subject, $request->message,$files));
                }
            }else {
                return json_encode(['status'=>"error", 'message'=>"No users selected to email"]);
            }
        }else {
            if ($request->recepient_type === "customers") {
                $emails =  $this->user->where('role','<>','admin')->pluck('email');
                foreach ($emails as $key => $value) {
                    Mail::to($value)->send(new Bulk($request->subject, $request->message, $files));
                }
            }
            if ($request->recepient_type === "partners") {
                $emails =  $this->partner->pluck('email');
                foreach ($emails as $key => $value) {
                    Mail::to($emails)->send(new Bulk($request->subject, $request->message, $files));
                }
            }
        }
        return json_encode(['status'=>'success','message'=>'Messages sent successfully.']);
    }

    public function visits($startdate, $enddate) {
        $query = $this->visit->query();
        if (!is_null($startdate)) {
            $query->whereDate('created_at','>=',$startdate);
        }
        if (!is_null($enddate)) {
            $query->whereDate('created_at', '<=', $enddate);
        }
        $visits = $query->get();
        return json_encode($visits);
    }

    function socialdelete(Request $request) {
        $social = $this->social->find($request->id);
        $social->delete();
        return json_encode(['status'=>'success','message'=>'Social deleted successfully']);
    }

}
