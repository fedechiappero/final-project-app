<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contratista;
use AppBundle\Entity\Persona;
use AppBundle\Entity\Proveedor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Persona controller.
 *
 * @Route("persona")
 */
class PersonaController extends Controller
{
    /**
     * Lists all persona entities.
     *
     * @Route("/", name="persona_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personas = $em->getRepository('AppBundle:Persona')->findAll();

        return $this->render('persona/index.html.twig', array(
            'personas' => $personas,
        ));
    }

    /**
     * Creates a new persona entity.
     *
     * @Route("/new", name="persona_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {//guardo datos

            $nombre = $request->request->get('nombre');
            $personajuridica = ($request->request->get('personajuridica') ? true : false);
            $cuit = $request->request->get('cuit');
            $documento = $request->request->get('documento');
            $direccion = $request->request->get('direccion');
            $celular = $request->request->get('celular');
            $email = $request->request->get('email');
            $localidad = $request->request->get('idlocalidad');

            $persona = new Persona();
            $persona
                ->setNombre($nombre)
                ->setPersonaJuridica($personajuridica)
                ->setCuit($cuit)
                ->setDocumento($documento)
                ->setDireccion($direccion)
                ->setCelular($celular)
                ->setEmail($email)
                ->setIdLocalidad($em->find('AppBundle:Localidad', $localidad));
            ;
            $em->persist($persona);
            $em->flush();


            if($request->request->get('contratista')){
                $contrazonsocial = $request->request->get('contrazonsocial');
                $contratista = new Contratista();
                $contratista->setId($persona);
                $contratista->setRazonSocial($contrazonsocial);
                $em->persist($contratista);
                $em->flush();
            }
            if($request->request->get('proveedor')){
                $provrazonsocial = $request->request->get('provrazonsocial');
                $proveedor = new Proveedor();
                $proveedor->setId($persona);
                $proveedor->setRazonSocial($provrazonsocial);
                $em->persist($proveedor);
                $em->flush();
            }

            return $this->redirectToRoute('persona_show', array('id' => $persona->getId()));
        }

        //muestro formulario                                  all     orderby
        $provincias = $em->getRepository('AppBundle:Provincia')->findBy(array(),array('nombre'=>'ASC'));
        return $this->render('persona/new.html.twig', array(
            'provincias' => $provincias
        ));
    }

    /**
     * Finds and displays a persona entity.
     *
     * @Route("/{id}", name="persona_show")
     * @Method("GET")
     */
    public function showAction(Persona $persona)
    {
        $deleteForm = $this->createDeleteForm($persona);
        $em = $this->getDoctrine()->getManager();

        $localidad = $em->find('AppBundle:Localidad', $persona->getIdLocalidad());
        $contratista = $em->find('AppBundle:Contratista', $persona->getId());
        $proveedor = $em->find('AppBundle:Proveedor', $persona->getId());

        return $this->render('persona/show.html.twig', array(
            'persona' => $persona,
            'localidad' => $localidad,
            'proveedor' => $proveedor,
            'contratista' => $contratista,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing persona entity.
     *
     * @Route("/{id}/edit", name="persona_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Persona $persona)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {

            $nombre = $request->request->get('nombre');
            $personajuridica = ($request->request->get('personajuridica') ? true : false);
            $cuit = $request->request->get('cuit');
            $documento = $request->request->get('documento');
            $direccion = $request->request->get('direccion');
            $celular = $request->request->get('celular');
            $email = $request->request->get('email');
            $localidad = $request->request->get('idlocalidad');

            $persona
                ->setNombre($nombre)
                ->setPersonaJuridica($personajuridica)
                ->setCuit($cuit)
                ->setDocumento($documento)
                ->setDireccion($direccion)
                ->setCelular($celular)
                ->setEmail($email)
                ->setIdLocalidad($em->find('AppBundle:Localidad', $localidad));
            ;

            $em->flush();

            if($request->request->get('contratista')){
                $new = false;
                $contrazonsocial = $request->request->get('contrazonsocial');
                $contratista = $em->find('AppBundle:Contratista', $persona->getId());
                if($contratista == null){
                    $contratista = new Contratista();
                    $new = true;
                }
                $contratista->setId($persona);
                $contratista->setRazonSocial($contrazonsocial);
                if($new){
                    $em->persist($contratista);
                }
                $em->flush();
            }else {//no contratista checked or, contratista uncheck
                $contratista = $em->find('AppBundle:Contratista', $persona->getId());
                if ($contratista) {
                    $em->remove($contratista);
                    $em->flush();
                }
            }

            if($request->request->get('proveedor')){
                $new = false;
                $provrazonsocial = $request->request->get('provrazonsocial');
                $proveedor = $em->find('AppBundle:Proveedor', $persona->getId());
                if($proveedor == null){
                    $proveedor = new Proveedor();
                    $new = true;
                }
                $proveedor->setId($persona);
                $proveedor->setRazonSocial($provrazonsocial);
                if($new){
                    $em->persist($proveedor);
                }
                $em->flush();
            }else{//no provider checked or, provider uncheck
                $proveedor = $em->find('AppBundle:Proveedor', $persona->getId());
                if($proveedor){
                    $em->remove($proveedor);
                    $em->flush();
                }
            }

            return $this->redirectToRoute('persona_show', array('id' => $persona->getId()));
        }

        $provincias = $em->getRepository('AppBundle:Provincia')->findBy(array(),array('nombre'=>'ASC'));
        $localidad = $em->getRepository('AppBundle:Localidad')->find($persona->getIdLocalidad());
        $contratista = $em->find('AppBundle:Contratista', $persona->getId());
        $proveedor = $em->find('AppBundle:Proveedor', $persona->getId());

        return $this->render('persona/edit.html.twig', array(
            'persona' => $persona,
            'provincias' => $provincias,
            'localidad' => $localidad,
            'proveedor' => $proveedor,
            'contratista' => $contratista
        ));
    }

    /**
     * Deletes a persona entity.
     *
     * @Route("/{id}", name="persona_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Persona $persona)
    {
        $form = $this->createDeleteForm($persona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($persona);
            $em->flush();
        }

        return $this->redirectToRoute('persona_index');
    }

    /**
     * Creates a form to delete a persona entity.
     *
     * @param Persona $persona The persona entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Persona $persona)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('persona_delete', array('id' => $persona->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
