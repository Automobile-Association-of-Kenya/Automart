<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Maillist;
use App\Models\Messages;
use App\Models\Services;
use App\Models\Social;
use App\Models\Visit;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('contact','socials');
        $this->service = new Services();
        $this->maillist = new Maillist();
        $this->message = new Messages();
        $this->visit =new Visit();
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

    function loanMessage(Request $request) {
        return $request;
    }

    function saleMessage(Request $request) {
        return $request;
    }

    function tradeinMessage(Request $request) {
        return $request;
    }

    function quoteMessage(Request $request) {
        return $request;
    }

    function message(Request $request) {
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
}
