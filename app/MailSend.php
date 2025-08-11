<?php

namespace App;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($items)
    {
        $this->details = $items;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*
        $hed = [
            'nama' => $this->details['nama'],
            'website' => $this->details['website'],
            'komentar' => $this->details['komentar']
        ];
        */
        $items = $this->details;

        return $this->subject('Penyampaian Hasil Verifikasi Pelaporan Gratifikasi | UPG Pemerintah Provinsi Jawa Timur')
                    ->view('admin.pelaporan_gratifikasi_data.mailtemplate', compact('items'));
    }
}
