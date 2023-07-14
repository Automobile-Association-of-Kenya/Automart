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
        // $this->middleware('auth');
        $this->service = new Services();
        $this->maillist = new Maillist();
        $this->message = new Messages();
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
        $socials = Social::where('name','social')->get();
        return view('contact', compact('phones','address', 'emails', 'socials'));
    }

    public function socials($id = null)
    {
        $socials = Social::get();
        return json_encode($socials);
    }

    public function socialStore(Request $request)
    {
        if (!is_null($request->social_id)) {
            $social = Social::find($request->social_id);
            $social->update(['name' => $request->name, 'link' => $request->link]);
            $message = 'Social updated successfully';
        } else {
            $social = Social::create(['name' => $request->name, 'link' => $request->link]);
            $message = 'Social created successfully';
        }
        return json_encode(['status' => 'success', 'message' => $message]);
    }

    public function webtraffic($date = null)
    {
        if (is_null($date)) {
            $date = date('Y-m-d');
        }
        $start_date = $date . ' 07:00:00';
        $end_time = $date . ' 18:00:00';
        $startTime = Carbon::createFromDate($start_date);
        $endTime = Carbon::createFromDate($end_time);
        $times =  new Collection();
        $currentTime = $startTime->copy();
        while ($currentTime <= $endTime) {
            $times->push($currentTime->format('Y-m-d H:i:s'));
            $currentTime->addHour();
        }
        $data = [];
        foreach ($times as $value) {
            $time = new DateTime($value);
            $time->modify('+1 hour');
            $end = $time->format('Y-m-d H:i:s');
            $date = Carbon::createFromDate($value);
            $start = $date->startOfHour()->isoFormat('Y-m-d HH:mm:ss');
            $end = $date->endOfHour()->isoFormat('Y-m-d HH:mm:ss');
            $visits = Visit::pluck('created_at');
            $results = DB::table('visits')->whereDate('created_at',$date)
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00') AS hour, COUNT(*) AS count"))
            ->groupBy('created_at')
            ->get();
            array_push($data, $results);
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
