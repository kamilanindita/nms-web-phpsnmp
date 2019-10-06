<?php


				require_once("koneksi/koneksi.php");

				//download paling besar
				$bytesssin=array();
				$ambil_down="SELECT * FROM interfaces WHERE id_connection='1' AND intname='ether1'";
                                 $hasil_down=$db->query($ambil_down);
                                 while($row=mysqli_fetch_array($hasil_down,MYSQLI_ASSOC)){
                              	  $bytesssin[]=$row['bytes_in'];
				}

				//$bytesssin=[4,8,10,15,2,5,9,1,11,12,2,2,0,1,5,6,7,7,1];

			
				$bytesin_usage=array();

				echo count($bytesssin);
				echo '='.json_encode($bytesssin);

				$rr=count($bytesssin);
				for($l=0;$l<$rr;$l++){
					if($bytesssin[$l]>$bytesssin[$l+1]){
						$bytesin_usage[]=$bytesssin[$l];
					}
				}
				echo"<br>";
				echo"<br>";
				echo 'jml='.count($bytesin_usage);
				echo"<br><br>";
				print_r($bytesin_usage);
				echo"<br><br>";
				echo 'jumlah='.array_sum($bytesin_usage);













?>