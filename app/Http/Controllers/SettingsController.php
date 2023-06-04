<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Models\Maillist;
use App\Models\Services;
use App\Models\Social;
use App\Models\Subscription;
use App\Models\Subsproperty;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->service = new Services();
        $this->maillist = new Maillist();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('settings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function services()
    {
        $services = $this->service->get();
        return json_encode($services);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function socials($id=null)
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
        }else {
            $social = Social::create(['name' => $request->name, 'link' => $request->link]);
            $message = 'Social created successfully';
        }
        return json_encode(['status'=>'success','message'=>$message]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function mails($id=null)
    {
        $query = $this->maillist->query();
        if (!is_null($id)) {
            $query->where('id',$id);
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
        }else {
            $mail = $this->maillist->create($validated);
            $message = "Mail added successfully";
        }

        return json_encode(['status'=>"success", "message"=>$message]);
    }
}
