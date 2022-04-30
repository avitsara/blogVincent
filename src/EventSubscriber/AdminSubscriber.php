<?php
/** ==== ON CRÉE UN EVENTSUBSCRIBER 
 * POUR QUE LES ÉVÈNEMENTS TELS QUE LA DATE DE CRÉATION DE PAGE , 
 * LA DATE DE MISE À JOUR DE LA PAGE SOIENT ÉCOUTÉS 
 * POUR QUE LES CHAMPS SOIENT PERSISTÉS *
 * === */
namespace App\EventSubscriber;

use App\Model\TimeStampedInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
class AdminSubscriber implements EventSubscriberInterface {

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setEntityCreatedAt'],
            BeforeEntityPersistedEvent::class => ['setEntityUpdatedAt']

        ];
    }
    /// On modifie la date de création de l'article
    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event):void {
        $entity = $event->getEntityInstance();
        if (!$entity instanceof TimeStampedInterface){
            return;
        }
        $entity->setCreatedAt(new \DateTime());
    }

    /// On modifie la date de msie à jour de l'article 
    public function setEntityUpdatedAt(BeforeEntityPersistedEvent $event):void {
        $entity = $event->getEntityInstance();
        if (!$entity instanceof TimeStampedInterface){
            return;
        }
        $entity->setUpdatedAt(new \DateTime());
    }
}



?>