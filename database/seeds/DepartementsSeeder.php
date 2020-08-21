<?php

use Illuminate\Database\Seeder;
use App\Departement;

class DepartementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departement::firstOrCreate(['region_id' => 'corse', 'name' => 'Corse-du-Sud','identifier' => '2A']);
        Departement::firstOrCreate(['region_id' => 'corse', 'name' => 'Haute-Corse','identifier' => '2B']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Ain','identifier' => '1']);
        Departement::firstOrCreate(['region_id' => 'hauts-de-france', 'name' => 'Aisne','identifier' => '02']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Allier','identifier' => '03']);
        Departement::firstOrCreate(['region_id' => 'provence-alpes-cote-d-azur', 'name' => 'Alpes-de-Haute-Provence','identifier' => '04']);
        Departement::firstOrCreate(['region_id' => 'provence-alpes-cote-d-azur', 'name' => 'Haute-Alpes','identifier' => '05']);
        Departement::firstOrCreate(['region_id' => 'provence-alpes-cote-d-azur', 'name' => 'Alpes-Maritimes','identifier' => '06']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Ardèche','identifier' => '07']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Ardennes','identifier' => '08']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Ariège','identifier' => '09']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Aube','identifier' => '10']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Aude','identifier' => '11']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Aveyron','identifier' => '12']);
        Departement::firstOrCreate(['region_id' => 'provence-alpes-cote-d-azur', 'name' => 'Bouche-du-Rhône','identifier' => '13']);
        Departement::firstOrCreate(['region_id' => 'normandie', 'name' => 'Calvados','identifier' => '14']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Cantal','identifier' => '15']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Charente','identifier' => '16']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Charente-Maritime','identifier' => '17']);
        Departement::firstOrCreate(['region_id' => 'centre-val-de-loire', 'name' => 'Cher','identifier' => '18']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Corrèze','identifier' => '19']);
        Departement::firstOrCreate(['region_id' => 'bourgogne-franche-comte', 'name' => 'Côte-D-or','identifier' => '21']);
        Departement::firstOrCreate(['region_id' => 'bretagne', 'name' => 'Côtes-D-Armor','identifier' => '22']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Creuse','identifier' => '23']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Dordogne','identifier' => '24']);
        Departement::firstOrCreate(['region_id' => 'bourgogne-franche-comte', 'name' => 'Doubs','identifier' => '25']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Drôme','identifier' => '26']);
        Departement::firstOrCreate(['region_id' => 'normandie', 'name' => 'Eure','identifier' => '27']);
        Departement::firstOrCreate(['region_id' => 'centre-val-de-loire', 'name' => 'Eure-et-Loir','identifier' => '28']);
        Departement::firstOrCreate(['region_id' => 'bretagne', 'name' => 'Finistère','identifier' => '29']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Gard','identifier' => '30']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Haute-Garonne','identifier' => '31']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Gers','identifier' => '32']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Gironde','identifier' => '33']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Hérault','identifier' => '34']);
        Departement::firstOrCreate(['region_id' => 'bretagne', 'name' => 'Ille-Et-Vilaine','identifier' => '35']);
        Departement::firstOrCreate(['region_id' => 'centre-val-de-loire', 'name' => 'Indre','identifier' => '36']);
        Departement::firstOrCreate(['region_id' => 'centre-val-de-loire', 'name' => 'Indre-et-Loire','identifier' => '37']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Isère','identifier' => '38']);
        Departement::firstOrCreate(['region_id' => 'bourgogne-franche-comte', 'name' => 'Jura','identifier' => '39']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Landes','identifier' => '40']);
        Departement::firstOrCreate(['region_id' => 'centre-val-de-loire', 'name' => 'Loir-et-Cher','identifier' => '41']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Loire','identifier' => '42']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Haute-Loire','identifier' => '43']);
        Departement::firstOrCreate(['region_id' => 'pays-de-la-loire', 'name' => 'Loire-Atlantique','identifier' => '44']);
        Departement::firstOrCreate(['region_id' => 'centre-val-de-loire', 'name' => 'Loiret','identifier' => '45']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Lot','identifier' => '46']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Lot-et-Garonne','identifier' => '47']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Lozère','identifier' => '48']);
        Departement::firstOrCreate(['region_id' => 'pays-de-la-loire', 'name' => 'Maine-et-Loire','identifier' => '49']);
        Departement::firstOrCreate(['region_id' => 'normandie', 'name' => 'Manche','identifier' => '50']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Marne','identifier' => '51']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Haute-Marne','identifier' => '52']);
        Departement::firstOrCreate(['region_id' => 'pays-de-la-loire', 'name' => 'Mayenne','identifier' => '53']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Meurthe-et-Moselle','identifier' => '54']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Meuse','identifier' => '55']);
        Departement::firstOrCreate(['region_id' => 'bretagne', 'name' => 'Morbihan','identifier' => '56']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Moselle','identifier' => '57']);
        Departement::firstOrCreate(['region_id' => 'bourgogne-franche-comte', 'name' => 'Nièvre','identifier' => '58']);
        Departement::firstOrCreate(['region_id' => 'hauts-de-france', 'name' => 'Nord','identifier' => '59']);
        Departement::firstOrCreate(['region_id' => 'hauts-de-france', 'name' => 'Oise','identifier' => '60']);
        Departement::firstOrCreate(['region_id' => 'normandie', 'name' => 'Orne','identifier' => '61']);
        Departement::firstOrCreate(['region_id' => 'hauts-de-france', 'name' => 'Pas-de-Calais','identifier' => '62']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Puy-du-Dôme','identifier' => '63']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Pyrénées-Atlantique','identifier' => '64']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Hautes-Pyrénées','identifier' => '65']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Pyrénées-Orientales','identifier' => '66']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Bas-Rhin','identifier' => '67']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Haut-Rhin','identifier' => '68']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Rhône','identifier' => '69']);
        Departement::firstOrCreate(['region_id' => 'bourgogne-franche-comte', 'name' => 'Haute-Saône','identifier' => '70']);
        Departement::firstOrCreate(['region_id' => 'bourgogne-franche-comte', 'name' => 'Saône-et-Loire','identifier' => '71']);
        Departement::firstOrCreate(['region_id' => 'pays-de-la-loire', 'name' => 'Sarthe','identifier' => '72']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Savoie','identifier' => '73']);
        Departement::firstOrCreate(['region_id' => 'auvergne-rhone-alpes', 'name' => 'Haute-Savoie','identifier' => '74']);
        Departement::firstOrCreate(['region_id' => 'ile-de-france', 'name' => 'Paris','identifier' => '75']);
        Departement::firstOrCreate(['region_id' => 'normandie', 'name' => 'Seine-Maritime','identifier' => '76']);
        Departement::firstOrCreate(['region_id' => 'ile-de-france', 'name' => 'Seine-et-Marne','identifier' => '77']);
        Departement::firstOrCreate(['region_id' => 'ile-de-france', 'name' => 'Yvelines','identifier' => '78']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Deux-Sèvres','identifier' => '79']);
        Departement::firstOrCreate(['region_id' => 'hauts-de-france', 'name' => 'Somme','identifier' => '80']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Tarn','identifier' => '81']);
        Departement::firstOrCreate(['region_id' => 'occitanie', 'name' => 'Tarn-et-Garonne','identifier' => '82']);
        Departement::firstOrCreate(['region_id' => 'provence-alpes-cote-d-azur', 'name' => 'Var','identifier' => '83']);
        Departement::firstOrCreate(['region_id' => 'provence-alpes-cote-d-azur', 'name' => 'Vaucluse','identifier' => '84']);
        Departement::firstOrCreate(['region_id' => 'pays-de-la-loire', 'name' => 'Vendée','identifier' => '85']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Vienne','identifier' => '86']);
        Departement::firstOrCreate(['region_id' => 'nouvelle-aquitaine', 'name' => 'Haute-Vienne','identifier' => '87']);
        Departement::firstOrCreate(['region_id' => 'grand-est', 'name' => 'Vosges','identifier' => '88']);
        Departement::firstOrCreate(['region_id' => 'bourgogne-franche-comte', 'name' => 'Yonne','identifier' => '89']);
        Departement::firstOrCreate(['region_id' => 'bourgogne-franche-comte', 'name' => 'Territoire-de-Belfort','identifier' => '90']);
        Departement::firstOrCreate(['region_id' => 'ile-de-france', 'name' => 'Essone','identifier' => '91']);
        Departement::firstOrCreate(['region_id' => 'ile-de-france', 'name' => 'Hauts-de-Seine','identifier' => '92']);
        Departement::firstOrCreate(['region_id' => 'ile-de-france', 'name' => 'Seine-Saint-Denis','identifier' => '93']);
        Departement::firstOrCreate(['region_id' => 'ile-de-france', 'name' => 'Val-de-Marne','identifier' => '94']);
        Departement::firstOrCreate(['region_id' => 'ile-de-france', 'name' => 'Val-d-Oise','identifier' => '95']); 
    }
}
