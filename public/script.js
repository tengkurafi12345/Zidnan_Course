function redirectToWhatsApp() {
    const phoneNumber = "6288803500523"; // Nomor WA Admin (gunakan format internasional tanpa tanda +)
    const message = `Halo Admin Zidnan, saya tertarik dengan zidnan dan ingin mendaftar.`;
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
    window.location.href = whatsappUrl;
}

