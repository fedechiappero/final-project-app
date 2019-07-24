<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Persona;
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

        return $this->render('persona/show.html.twig', array(
            'persona' => $persona,
            'localidad' => $localidad,
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

            return $this->redirectToRoute('persona_show', array('id' => $persona->getId()));
        }

        $provincias = $em->getRepository('AppBundle:Provincia')->findBy(array(),array('nombre'=>'ASC'));
        $localidad = $em->getRepository('AppBundle:Localidad')->find($persona->getIdLocalidad());

        return $this->render('persona/edit.html.twig', array(
            'persona' => $persona,
            'provincias' => $provincias,
            'localidad' => $localidad
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
