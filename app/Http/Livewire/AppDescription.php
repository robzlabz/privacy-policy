<?php

namespace App\Http\Livewire;

use Buchin\GoogleSuggest\GoogleSuggest;
use Livewire\Component;

class AppDescription extends Component
{
    public $name;
    public $description;

    public function updatedName()
    {
        $words = [];
        $chars = ['', 'a', 'e', 'm', 'l', 'r'];
        foreach ($chars as $char) {
            $words = array_merge($words, GoogleSuggest::grab(
                sprintf('%s %s', $this->name, $char)
            ));
        }

        $related = [];
        foreach ($words as $word) {
            $related[] = sprintf('- %s', ucwords($word));
        }
        $related = implode(PHP_EOL, $related);

        $text = 'Aplikasi Resep ' . $this->name . ' merupakan aplikasi yang berisi kumpulan aneka Resep cara membuat ' . $this->name . ' dengan mudah , sederhana , praktis dan enak. Resep ' . $this->name . ' terkini cocok sebagai referensi anda untuk membuat masakan ' . $this->name . ' untuk keluarga tercinta.' . PHP_EOL . PHP_EOL;
        $text .= 'Dalam aplikasi ini berisi puluhan koleksi resep ' . $this->name . ' terbaru yang simple , enak dan mudah anda tiru serta bervariasi dapat anda kembangkan sesuai bahan yang tersedia di dapur jadi saya sarankan wajib untuk anda coba, resep tersebut antara lain :' . PHP_EOL . PHP_EOL;
        $text .= $related . PHP_EOL . PHP_EOL;
        $text .= 'Pengen buat makanan sendiri dirumah jangan khawatir sekarang kami akan menyajikan berbagai resep ' . $this->name . ' yang enak dan nikmat jadi kalian gak perlu capek-capek keluar rumah untuk membeli makanan kesukaan keluarga, karena sekarang kalian dapat berkreasi langsung dalam menciptakan masakan sederhana yang enak dan mudah untuk dibuat. Diaplikasi ini kalian akan mendapatkan banyak resep membuat ' . $this->name . ' sehat dan mudah untuk dipraktekan bersama keluarga.' . PHP_EOL . PHP_EOL;
        $text .= 'dan masih banyak lagi resep ' . $this->name . ' terkini, mudah dan praktis dalam aplikasi ini, cocok bagi pemula dan yang hobby memasak penasaran ingin tahu bagaimana resep dan cara membuatnya unduh aplikasi ini secara gratis di smartphone anda.' . PHP_EOL . PHP_EOL;
        $text .= 'semoga bermanfaat, Terimakasih .';
        $this->description = $text;
    }

    public function render()
    {
        return view('livewire.app-description');
    }
}
