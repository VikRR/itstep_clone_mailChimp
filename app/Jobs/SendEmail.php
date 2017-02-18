<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\ListModel;
use App\Mail\Test as TestMail;
use App\EmailSendSettingModel;
use App\EmailSendTypeModel;




class SendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    
    private $listId;
    private $message;
    private $subject;
    private $userId;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($listId,$messsage,$subject,$userId)
    {
        $this->listId = $listId;
        $this->message = $messsage;
        $this->subject = $subject;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Config::set('mail.driver', $this->getMailDriver());
        (new \Illuminate\Mail\MailServiceProvider(app()))
        ->register();
        $listSubscribers = ListModel::findOrFail($this->listId)
                ->subscribers()
                ->get();
        foreach ($listSubscribers as $subscriber){
            $mail = new TestMail($this->message, $this->subject);
            \Mail::to($subscriber->email)
                    ->send($mail);
        }
    }
    public function getMailDriver()
    {
        $typeId = EmailSendSettingModel::where('user_id',$this->userId)
                ->value('type_send_id');
        if(!empty($typeId)){
            return \App\EmailSendTypeModel::find($typeId)->type;
        }else{
            return \App\EmailSendTypeModel::first()->type;
        }
//        исправить мою модель настроек
    }
}
