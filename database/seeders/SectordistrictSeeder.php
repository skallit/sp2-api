<?php

namespace Database\Seeders;

use App\Models\Sector;
use App\Models\Sectordistrict;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectordistrictSeeder extends Seeder
{
    use Truncatable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(Sectordistrict::class);

        $districts = [
            'Centre'=>['Ile de France','Centre Val de Loire'],
            'Nord-Ouest'=>['Bretagne','Pays de la Loire','Normandie'],
            'Nord-Est'=>['Hauts de France','Grand Est','Bourgogne Franche Comté'],
            'Sud-Ouest'=>['Nouvelle Aquitaine','Occitanie'],
            'Sud-Est'=>['Auvergne Rhone Alpes','Provence Alpes Cote d\'Azur','Corse'],
            'DTOM Caraïbes-Amériques'=>['Mayotte','La Réunion'],
            'DTOM Asie-Afrique'=>['Guyane','Guadeloupe','Martinique']
        ];
        foreach($districts as $sectorName=>$names){
            $sector = Sector::firstWhere('name',$sectorName);
            foreach($names as $name){
                Sectordistrict::create(['name'=>$name,'sector_id'=>$sector->id]);
            }
        }
    }
}
