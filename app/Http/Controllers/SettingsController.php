<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Maillist;
use App\Models\Services;
use App\Models\Social;
use App\Models\Subscription;
use App\Models\Subsproperty;
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
            // $visits = Visit::whereBetween('created_at',[$value, $end])->count();
            $visits = Visit::whereDate('created_at','>=',$value)->whereDate('created_at','<=',$end)->count();
            $obj = [date('H:i', strtotime($value)) => $visits];
            array_push($data, $obj);
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
}
