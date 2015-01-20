<?php
 include('player.php');
 // Stop the script giving time out errors..
    set_time_limit(0);

  $obj = new Player;
  
    // This opens standard in ready for interactive input..
    define('STDIN',fopen("php://stdin","r"));

				echo "#=====================================================#\n\n";
				echo "#                   Welcome to Battle Arena           #\n";
				echo "#-----------------------------------------------------#\n";
				echo "# Description :                                       #\n";
				echo '# 1. ketik "new" untuk membuat karakter 	      # ';
				echo "\n";
				echo '# 2. ketik "start" untuk memulai pertarungan 	      # ';
				echo "\n";
				echo "#-----------------------------------------------------#\n";
				echo "# Current Player :                                    #\n";
				echo "#                      -                              #\n";
				echo "# * max player 2 atau 3                               #\n";
				echo "#-----------------------------------------------------#\n";
				$new_char=FALSE;
				$num_char=0;
		 while(!feof(STDIN))
    {
        // Decide what menu option to select based on input..
		$var = trim(fgets(STDIN,256));
		if(!empty($var)){
			if($var=="new"){
				echo "#=====================================================#\n\n";
				echo "#                   Welcome to Battle Arena           #\n";
				echo "#-----------------------------------------------------#\n";
				echo "# Description :                                       #\n";
				echo '# 1. ketik "new" untuk membuat karakter 	      # ';
				echo "\n";
				echo '# 2. ketik "start" untuk memulai pertarungan 	      # ';
				echo "\n";
				echo "#-----------------------------------------------------#\n";
				echo "# Masukkan Nama Player :<nama_player>	              #\n";
				echo "#                      -                              #\n";
				echo "# * max player 2 atau 3                               #\n";
				echo "#-----------------------------------------------------#\n";
				$new_char=TRUE;
			}elseif($var=="start"){
				echo "#=====================================================#\n\n";
				echo "#                   Welcome to Battle Arena           #\n";
				echo "#-----------------------------------------------------#\n";
				echo "Battle Start :                                         \n";
				echo "siapa yang akan menyerang : <nama_player_1>            \n";
				echo "siapa yang di serang : <nama_player_2> 	             \n";
				$battle = 'Y';
				$penyerang = 'Y';
			}else{
				if($battle=='Y' && $penyerang=='Y'){
					for($i=1;$i<=$num_char;$i++){
						if($player[$i]['name'] == $var){
							$nama_1 = $player[$i]['name'];
							$player[$i]['manna'] = $player[$i]['manna']-20;
							$mana_1 = $player[$i]['manna'];
							$blood_1 = $player[$i]['blood'];
						}
					}
					$penyerang = 'N';
				}elseif($battle=='Y' && $penyerang=='N'){
					for($i=1;$i<=$num_char;$i++){
						if($player[$i]['name'] == $var){
							$nama_2 = $player[$i]['name'];
							$player[$i]['blood'] = $player[$i]['blood']-20;
							$mana_2 = $player[$i]['manna'];
							$blood_2 = $player[$i]['blood'];
						}
					}
					$battle = 'N';
					echo "#=====================================================#\n\n";
					echo "#                   Welcome to Battle Arena           #\n";
					echo "#-----------------------------------------------------#\n";
					echo "Battle Start :                                         \n";
					echo "siapa yang akan menyerang : $nama_1           \n";
					echo "siapa yang di serang : $nama_2	             \n";
					if($mana_1>0){
						echo "Description :             \n";
						echo "$nama_1 : manna =$mana_1,blood=$blood_1           \n";
						echo "$nama_2 : manna =$mana_2,blood=$blood_2            \n";
					}else{
						echo "$nama_1 ( Game Over )";
						exit();
					}
				}else{
				
				if($new_char==TRUE && $num_char<3){
					$num_char++;
					//$char[$num_char]= $var;
					$player[$num_char] = (array)$obj->set_player($var);
				}
				echo "#=====================================================#\n\n";
				echo "#                   Welcome to Battle Arena           #\n";
				echo "#-----------------------------------------------------#\n";
				echo "# Description :                                       #\n";
				echo '# 1. ketik "new" untuk membuat karakter 	      # ';
				echo "\n";
				echo '# 2. ketik "start" untuk memulai pertarungan 	      # ';
				echo "\n";
				echo "#-----------------------------------------------------#\n";
				echo "# Current Player  :$num_char	   	                      #\n";
				
				for($i=1;$i<=$num_char;$i++){
					if($player[$i]['gameover']=='Y'){
						$ket = ' ( Game Over ) ';
					}else{
						$ket = "";
					}
					echo "#                      - ".$player[$i]['name']. $ket ."                   #\n";
				}
				
				echo "# * max player 2 atau 3                               #\n";
				echo "#-----------------------------------------------------#\n";
				$new_char=FALSE;
				}
			}
		}
				
		
	}
    // Close standard in..
    fclose(STDIN);
?>