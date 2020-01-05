<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;
   
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@hobbyshop.com', 'Admin')
                    ->to('nesto@nesto.com', 'nesto')
                    ->subject('Vaša narudžba')    
                    ->markdown('emails.orders');
    }
}