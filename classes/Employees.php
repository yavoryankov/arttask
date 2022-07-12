<?php



class Employees {
	/*
	Class za izvlichane na nujnata ni informacia ot tablicite svarzani sas slujitelia
	Imame 3 tablici
	
	employees -  sadarja konstantnite ni za calkulaciata danni - employee_id i employee_name
	employment - tablica naznachenia - koga i kak e naznachen slujitelia na tekushtata pozicia
				nachalo na naznachenieto, krai, pozicia, koeficient
				tova sa danni, koito se promeniat vav vremeto i obiknoveno se nalaga
				da se gledat v istoricheski plan, v sluchaia zadachata niama takiva
				uslovia no pri proektiraneto na strukturata e dobre da se predvidiat
				employee_id - vrazka sas slujitelia, appointed - data na naznachavane, released - data na osvobojdavane, employee_type - pozicia, coef - koeficienta za smiatane na dnite za otpuska (v sluchaia 1,7)
				Zabelejka, pri prektirane na funkcia za novo naznachenie, triabva da se proveriava za veche sashtestvuvashto i to da bade priklucheno ako veche ne e napraveno s data predhodna na datata na naznachavaneto!
				
	furlough - izpolzvani otpusni dni
				employee_id - vrazka sas slujitelia, from_date - nachalo na otpuskata, 
				to_date - krai na otpuskata, used_days - dni na otpuskata.
				Izpolzvam used_days, zashtoto tova bi ulsnilo kalkulaciite. V zadachata ne e
				formulirano kak se presmiata tozi broi - dali se presmiatat wikendite i nacionalnite praznici, kakto i rojdenni dni i kakvit tam firmeni politiki ima kompaniata. Presmiataneto na tazi broika e predmet na otdelna funkcia, koiato ne e dadena v zadachata.
				
				
	zavelejka - v uslovieto na zadachata ima greshka "Николай е бил в отпуска в периода 13-16.04.2020 г. (6 дни), ". Niama kak intervala ot 13 do 15 april da e 6 dni. vavel sam go 4.
	
	*/
	private $db;
	
	 public function __construct()
    {
		$dbc = new Dbcon();
		$this->db = $dbc->db_connect();
    }
	
	
	public function getAll(){
		$all=[];
		$sql="SELECT e.employee_id as employee_id, 
					e.employee_name as employee_name, 
					p.employee_type as employee_type, 
					p.appointed as appointed, 
					p.coef as coef,
					u.used_days as used_days
				FROM employees e 
				INNER JOIN 
				(SELECT employee_id, appointed, employee_type, coef FROM employment WHERE released IS NULL GROUP BY employee_id) p ON e.employee_id=p.employee_id 
				LEFT JOIN 
				(SELECT employee_id, sum(used_days) as used_days FROM furlough GROUP BY employee_id) u ON e.employee_id=u.employee_id";
				
		//zaiavkata e oprostena i ne gleda v istoricheski plan
		//ako triabva da sme korektni, za vseki slujitel triabva da se proveriava
		//dali ima predhodni naznachenia, za kakuv period sa i pri kakuv koeficient
		//v sluchaia gledam samo zapisite ot zadachata
		//zaiavkata e limitirana i vrashta samo slujiteli s aktivni naznachenia
		
		$st = $this->db->query($sql); 
		while($row = $st->fetch(PDO::FETCH_ASSOC)){
				
			$all[]=new Employee($row["employee_id"], $row["employee_name"], $row["employee_type"], $row["appointed"], $row["coef"], $row["used_days"]);
		}
		return $all;
	}

}