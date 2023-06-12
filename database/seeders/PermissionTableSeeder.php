<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // permission 

    $permission = Permission::pluck('id')->toArray();
    if( sizeof($permission) == 0 ){
        $arr =[
            
         // les permission pour niveau des etudes
               "list_niveau",
               "ajouter_niveau",
               "supprimer_niveau",
               "modifier_niveau",
         // les permission pour les classes
               "list_classes",
               "ajouter_classes",
               "modifier_classes",
               "supprimer_classes",
               "supprimer_tous_classes",
         // les permission pour les parents
               "list_parents",
               "ajouter_parents",
               "modifier_parents",
               "supprimer_parents",
         // les permission pour les enseignants
                "list_enseignants",
                "ajouter_enseignats",
                "modifier_enseignats",
                "supprimer_enseignants",        
        // les permission pour les Sections
                "list_sections",
                "ajouter_sections",
                "modifier_sections",
                "supprimer_sections",
        // les permission pour les Etudaints
                "list_etudaints",
                "ajouter_etudaints",
                "modifier_etudaints",
                "supprimer_etudaints",
                 "show_etudaints",
                 "paiements_etudaints",
         // les permission pour               

              "Comptes_Financiers",
             // Frais de scolarité
                "list_frais",
                "ajouter_frais",
                "modifier_frais",
                "supprimer_frais",
             //  les factures
                "list_factures",
                "ajouter_factures",
                "modifier_factures",
                "supprimer_factures",
             // les paiements 
                "list_paiements",
                "ajouter_paiements",
                "modifier_paiements",
                "supprimer_paiements",
             //Traitements
                "list_traitements",
                "ajouter_traitements",
                "modifier_traitements",
                "supprimer_traitements",
             //echanges
                "list_echanges",
                "ajouter_echanges",
                "modifier_echanges",
                "supprimer_echanges",

            // Presence
                 "presence",
            // gestion des roles
                  "gestions_roles" 

           
        ];
    
        for($i=0 ; $i<count($arr); $i++){
            DB::table('permissions')->insert([
                'name' => $arr[$i],
                'guard_name' => 'web',
            ]);
        }
    }

    
    }
}
