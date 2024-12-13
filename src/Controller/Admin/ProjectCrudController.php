<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('title', 'Titre'),
            TextEditorField::new('description', 'Description'),
            DateField::new('start_date', 'Date de début'),
            DateField::new('end_date', 'Date de fin'),
            ChoiceField::new('status', 'Status')->setChoices([
                'Planifié' => 'planned',
                'En cours' => 'in_progress',
                'Terminé' => 'completed',
            ]),
            MoneyField::new('totalBudget', 'Budget Total')->setCurrency('EUR'),
            MoneyField::new('collectedBudget', 'Budget Récolté')->setCurrency('EUR'),
            IntegerField::new('numberOfParticipants', 'Nombre de Participants'),
            DateField::new('createdAt')->onlyOnIndex(),

            
        ];
    }
    
}
