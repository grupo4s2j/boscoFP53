<?php
namespace   Traits;

trait FuncionesExtra
{
    /**
     * Formatea la fecha para que se muestre como queremos
     *
     * @return  $recurso->fecha
     */
    public function formatFecha($fechaPosteo)
    {
        $fecha = explode('-', $fechaPosteo);
        switch($fecha[1]){
            case '01' : $fecha[1] = 'January';break;
            case '02' : $fecha[1] = 'February';break;
            case '03' : $fecha[1] = 'March';break;
            case '04' : $fecha[1] = 'April';break;
            case '05' : $fecha[1] = 'May';break;
            case '06' : $fecha[1] = 'June';break;
            case '07' : $fecha[1] = 'July';break;
            case '08' : $fecha[1] = 'August';break;
            case '09' : $fecha[1] = 'September';break;
            case '10' : $fecha[1] = 'October';break;
            case '11' : $fecha[1] = 'November';break;
            case '12' : $fecha[1] = 'December';break;
        }

        $fechahora = explode(' ', $fecha[2]);
        
        return $fecha[1] . ' ' . $fechahora[0] . ', ' . $fecha[0];
    }
    
    /**
     * Recoje la hora en la que se realiza el Post
     *
     * @return  $recurso->horaPosteo
     */
    public function horaPosteo($fechaPosteo)
    {
        $hora = explode(' ', $fechaPosteo);
        
        return $hora[1];
    }
    
    /**
     * Formatea la fecha para que se muestre como queremos
     *
     * @return  $recurso->fecha
     */
    public function recursosFechaHora($recursos)
    {
        if(count($recursos) > 0){
            foreach($recursos as $recurso){
                $recurso->fechaPosteo = $this->formatFecha($recurso->fechaPost); 
                $recurso->horaPosteo = $this->horaPosteo($recurso->fechaPost);
            }
        }
        return $recursos;
    }
    
    /**
     * Pasa el nombre del rol a su ID
     *
     * @return  $idrol
     */
    public function getAndSetCookieValue()
    {
        if (\Cookie::get('tsfi_role') !== null){
            $tsfi_role = \Cookie::get('tsfi_role');
            if($tsfi_role == 'profesor'){
                $idrol = 2;
            }
            elseif($tsfi_role == 'alumno'){
                $idrol = 1;
            }
        }
        
        return $idrol;
    }
}