<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle contact form submission and redirect to WhatsApp.
     */
    public function sendToWhatsApp(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string|max:300',
        ]);

        // Ambil data dari form setelah validasi
        $name    = $validatedData['name'];
        $email   = $validatedData['email'];
        $message = $validatedData['message'];

        // Nomor WhatsApp tujuan
        $phoneNumber = '6281230797357';

        // Format pesan WhatsApp
        $whatsappMessage = "*Formulir Pertanyaan & Reservasi – Larassa & Eat*\n\n" .
            "Anda sedang mengirim pertanyaan seputar Larassa & Eat, mulai dari informasi menu makanan dan minuman, detail acara atau event yang berlangsung, hingga permintaan layanan reservasi tempat. Silakan cek kembali detail data Anda di bawah ini:\n\n" .
            "*Detail Pemesan:*\n" .
            "Nama: $name\n" .
            "Email: $email\n\n" .
            "*Pesan Anda:*\n" .
            "$message\n\n" .
            "Terima kasih telah menghubungi tim Larassa. Pesan Anda sudah kami terima dan akan segera kami respon.";

        // Encode pesan agar sesuai dengan format URL
        $encodedMessage = urlencode($whatsappMessage);

        // Buat URL WhatsApp
        $whatsappUrl = "https://api.whatsapp.com/send?phone=$phoneNumber&text=$encodedMessage";

        // Redirect ke WhatsApp
        return redirect()->away($whatsappUrl);
    }
}
