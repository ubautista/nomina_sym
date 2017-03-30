<?php

namespace Nomina\NominaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nomina\NominaBundle\Entity\Nomina;

/**
 * Controlador para nomina.
 */
class NominaController extends Controller
{
	public function procesarAction(){
		$ob_em =  $this->get('doctrine')->getManager();
		$arr_nomina_procesar = $ob_em->getRepository('NominaBundle:Nomina')->getRegistrosSinProcesar();
		foreach($arr_nomina_procesar as $arr_procesar){
			$sueldo_base = $arr_procesar['sueldo_base'];
			if(strlen($sueldo_base)>0){			
			$ob_nomina = $ob_em->getRepository('NominaBundle:Nomina')->find( $arr_procesar['id'] );
						
			$n_pension = round( ($sueldo_base / 100) * 4 );
			$n_eps = round( ($sueldo_base / 100) * 4 );
			$n_sueldo_devengado = $sueldo_base - ($n_pension + $n_eps);

			$ob_nomina->setPension($n_pension);
			$ob_nomina->setEps($n_eps);
			$ob_nomina->setValorDevengado($n_sueldo_devengado);
			
			$ob_em->persist($ob_nomina);
			}			
		}
		$ob_em->flush();
		
		$arr_nomina_relacionados = $ob_em->getRepository('NominaBundle:Nomina')
			->get_relacionados_usuario_nomina();

		return $this->render(
				"NominaBundle:Nomina:list.html.twig",
				array('arr_nomina' => $arr_nomina_relacionados)
		);		
	}

}
// FINALIZA CONTROLADOR 