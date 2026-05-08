<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        $data = [
            'titre' => 'À propos de nous',
            'description' => 'Nous sommes une équipe passionnée par Laravel !'
        ];
        return view('about', $data);
    }

    public function services()
    {
        $services = [
            ['nom' => 'Développement Web', 'prix' => '1500€'],
            ['nom' => 'Design UI/UX', 'prix' => '1800€'],
            ['nom' => 'power bi', 'prix' => '500€']
        ];
        return view('services', compact('services'));
    }

    public function contact()
    {
        $contacts = [
            'email' => 'contact@monsite.com',
            'telephone' => '55 64 16 65 68',
            'adresse' => '127 Rue PARIS, TUNIS'
        ];
        return view('contact', compact('contacts'));
    }

    public function blog()
    {
        $articles = [
            [
                'id' => 1,
                'titre' => 'Ordinateur Portable',
                'auteur' => 'Dell',
                'date' => '2026-03-01',
                'extrait' => 'PC portable puissant pour développement et gaming.'
            ],
            [
                'id' => 2,
                'titre' => 'Carte Graphique RTX',
                'auteur' => 'Nvidia',
                'date' => '2026-03-02',
                'extrait' => 'Carte graphique haute performance pour IA et jeux.'
            ],
            [
                'id' => 3,
                'titre' => 'Disque SSD 1TB',
                'auteur' => 'Samsung',
                'date' => '2026-03-03',
                'extrait' => 'Stockage ultra rapide pour ordinateur.'
            ]
        ];
        return view('blog', compact('articles'));
    }

    public function article($id)
    {
        $contenus = [
            1 => ['titre' => 'Article 1', 'auteur' => 'Mohamed', 'contenu' => 'Contenu complet du premier article...'],
            2 => ['titre' => 'Article 2', 'auteur' => 'Chayma', 'contenu' => 'Contenu complet du deuxième article...'],
            3 => ['titre' => 'Article 3', 'auteur' => 'Amine', 'contenu' => 'Contenu complet du troisième article...']
        ];

        if (!isset($contenus[$id])) {
            abort(404);
        }

        return view('article', ['article' => $contenus[$id]]);
    }

    // Routes dynamiques TP
    public function calculer($a, $b)
    {
        $somme = $a + $b;
        return "La somme de $a et $b est $somme";
    }

    public function age($age)
    {
        return $age >= 18 ? "Vous êtes majeur" : "Vous êtes mineur";
    }

    public function equipe($membre = null)
    {
        $membres = ['Mohamed', 'Chayma', 'Amine', 'David', 'Emma'];

        if ($membre) {
            return "Membre : $membre";
        }

        return "Toute l'équipe : " . implode(', ', $membres);
    }
}
