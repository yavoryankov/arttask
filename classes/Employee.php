<?php



class Employee {
	/*
	
	class za slujitel, sadarja danite mu i funkcia za kalkulirane na natrupanite dni otpusk
	niama vrazka s bazata danni
	
	*/
	
	private $employee_id;
	private $employee_name;
	private $employee_type;
	private $appointed;
	private $coef;
	private $used_days;
	
	private $accumulated ;
	
	
	
	 public function __construct($employee_id, $employee_name, $employee_type, $appointed, $coef, $used_days)
    {
		//inicializiram vsichki izvestni stoinosti
		$this->employee_id=$employee_id;
		$this->employee_name=$employee_name;
		$this->employee_type=$employee_type;
		$this->appointed=$appointed;
		$this->used_days=($used_days ?? 0);
		$this->coef=$coef;
		//accumulated days calculation
		$this->calculateAccumulated();
    }
	
	
	private function calculateAccumulated(){
		//Calculaciata ne presmiata stoinostite istoricheski a priemam, che niama promiana 
		//vav coeficienta i poziciata
		//za da e neshto, koeto e blizko do realnosta triabva da se proveriava 
		//dali ima natrupani dni pri razlichni uslovia na rabota - periodi na otsastvie, 
		//kato naprimer maichnistvo ili bolest, ili promiana na koeficienata
		
		$start=new DateTime($this->appointed); 
		$end=new DateTime();                                  
		$diff = $end->diff($start); 
		$this->accumulated=round(((($diff->y)*12)+($diff->m))*$this->coef);
		
		
	}
	
	public function get(){
		//vrushta masiv s cialata informacia za slujitelia
		return [
			"employee_id"=>$this->employee_id,
			"employee_name"=>$this->employee_name,
			"employee_type"=>$this->employee_type,
			"appointed"=>$this->appointed,
			"used_days"=>$this->used_days,
			"accumulated"=>$this->accumulated,
		];
	}
	
	
}