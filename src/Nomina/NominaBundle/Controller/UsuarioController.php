<?php

namespace Nomina\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nomina\NominaBundle\Entity\Usuario;
use Nomina\NominaBundle\Entity\Nomina;
use Nomina\NominaBundle\Form\UsuarioType;

/**
 * Controlador del usuario.
 */
class UsuarioController extends Controller
{
	public function listAction(){
		$ob_em =  $this->get('doctrine')->getManager();
		$arr_usuarios = $ob_em->getRepository('NominaBundle:Usuario')->findAll();
	
		return $this->render(
				"NominaBundle:Usuario:list.html.twig",
				array('arr_usuarios' => $arr_usuarios )
		);
	}
	
	public function crearAction(){
		$ob_usuario  = new Usuario();
		
		$form   = $this->createForm(new UsuarioType() , $ob_usuario);		
		$request = $this->getRequest();
		if( $request->getMethod() == "POST"){
		$form->bind($request);			
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($ob_usuario);
				$em->flush();				
				 return $this->redirect(
				 	$this->generateUrl('NominaBundle_homepage', array())
				 );
			}
		}
		
		return $this->render('NominaBundle:Usuario:new.html.twig', array(				
				'form'   => $form->createView()
		));
	
	}
	
	
	public function editarAction( $id ){
		
		$em = $this->getDoctrine()->getManager();
		$ob_usuario = $em->getRepository('NominaBundle:Usuario')->find($id);
	
		$form   = $this->createForm(new UsuarioType() , $ob_usuario);
		$request = $this->getRequest();
		if( $request->getMethod() == "POST"){
			$form->bind($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($ob_usuario);
				$em->flush();
				return $this->redirect(
						$this->generateUrl('NominaBundle_homepage', array())
				);
			}
		}
			
		return $this->render('NominaBundle:Usuario:new.html.twig', array(
				'form'   => $form->createView()
		));
	
	}
		
	public function borrarAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$ob_usuario = $em->getRepository('NominaBundle:Usuario')->find($id);
	
		if (!$ob_usuario) {
			throw $this->createNotFoundException('No se encontro el id '.$id);
		}
	
		$em->remove($ob_usuario);
		$em->flush();
	
		return $this->redirect(
				 	$this->generateUrl('NominaBundle_homepage', array())
		 );
	}
	public function add_salarioAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$ob_usuario = $em->getRepository('NominaBundle:Usuario')->find($id);
		if (!$ob_usuario) {
			throw $this->createNotFoundException('No se encontro el id '.$id);
		}
		$request = $this->getRequest();
		$ob_nomina = new Nomina();
		$form = $this->createFormBuilder($ob_nomina)
			->add('sueldo_base')
			->getForm();
		if($request->getMethod() == "POST" ){
			$form->bind($request);
			if ($form->isValid()) {
				$ob_nomina_valor = $em->getRepository('NominaBundle:Nomina')->findOneBy(array('sueldo_base' => $ob_nomina->getSueldoBase()));
				if(!$ob_nomina_valor){
					$em = $this->getDoctrine()->getManager();
					$em->persist($ob_nomina);
					$em->flush();
				}
				else{ // En caso de que valor ya exista carga la referencia 
					$ob_nomina = $ob_nomina_valor;
				}
				
				$ob_usuario = $em->getRepository('NominaBundle:Usuario')->find($id);
				$ob_usuario->setIdNomina( $ob_nomina );
				$em = $this->getDoctrine()->getManager();
				$em->persist($ob_usuario);
				$em->flush();
				 $request->getSession()
				->getFlashBag()
				->add(
						'notice',
						'Se asigno el salario al usuario.'
				);
				return $this->redirect(
						$this->generateUrl('NominaBundle_homepage', array())
				);
			}
		}
		$nomina_id = 0;
		$nomina = $ob_usuario->getIdNomina();
		if($nomina !== null){
			$nomina_id = $nomina->getId();
		}
		if($nomina_id > 0){
			$request->getSession()
	        ->getFlashBag()
	        ->add(
					'notice',
					'El usuario ya tiene asignado salario.'
			);
			return $this->redirect(
					$this->generateUrl('NominaBundle_homepage', array())
			);
		}	
		
		return $this->render('NominaBundle:Usuario:salario.html.twig', array(
			'form'   => $form->createView()
		));

	}	
}
// FINALIZA CONTROLADOR 