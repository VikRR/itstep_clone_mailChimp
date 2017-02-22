<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\ListModel;
use App\User as UserModel;
use App\Mail\Test as TestMail;
use App\Models\EmailSettings;


/**
 * Class SendEmail
 * @package App\Jobs
 */
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
     * @param $listId
     * @param $message
     * @param $subject
     * @param $userId
     */
    public function __construct($listId, $message, $subject, $userId)
    {
        $this->listId = $listId;
        $this->message = $message;
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
        (new \Illuminate\Mail\MailServiceProvider(app()))->register();// перезапуск драйвера отправки писем
        $listSubscribers = ListModel::findOrFail($this->listId)
            ->subscribers()
            ->get();

        foreach ($listSubscribers as $subscriber) {
            $mail = new TestMail($this->message, $this->subject);
            \Mail::to($subscriber->email)
                ->send($mail);
        }
    }

    /**
     * @return mixed
     */
    public function getMailDriver()
    {
        $typeId = UserModel::find($this->userId)
            ->sendTypes()
            ->where('user_id', $this->userId)
            ->value('email_send_type_id');

        if (!empty($typeId)) {
            return EmailSettings::find($typeId)->type;
        } else {
            return EmailSettings::first()->type;
        }
    }
}
