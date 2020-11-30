<?php

    require '../../php/conexion.php';

    session_start();
      
    // Si no existe la variable de sesión logueado, entonces el usuario debe loguearse.
    if (!isset($_SESSION["logueado"])) {
      header("location: ../../index.php?error=debe_loguearse");
      exit;
    }

    

   


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
    <?php require '../../php/head_link.php'; ?>
    <?php require '../../php/head_script.php'; ?>
    <link rel="stylesheet" href="\autoparts_system\css\marcas.css">

    <script src="vehiculos.js"></script>
    <script src="\autoparts_system\js\jquery-redirect.js"></script>
</head>
<body>    

    <?php require '../../php/menu.php'; ?>
    
    <div class="container-fluid">

        <!-- <div class="card" id="card-main"> -->
            <!-- <div class="card-header"> -->
               <!-- <div class="container"> -->

               <div class="card">
                    <strong><h3 class="card-header">Marcas</h3></strong>
                    <div class="card-body">
                        <h5 class="card-title">Seleccione la marca del vehiculo solicitado:</h5>
                           
                            <span data-toggle="tooltip" data-placement="top" title="ABARTH"><a id="1" href="" data-toggle="modal" data-target="#modeloVehiculo"><img class="marcasautos"src="/autoparts_system/img/marcas/abarth.jpg" alt="Autopartes: Abarth" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="ACURA"><a  id="60" href="" data-toggle="modal" data-target="#modeloVehiculo"><img class="marcasautos"src="/autoparts_system/img/marcas/acura.jpg" alt="Autopartes: Acura" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="ALFA ROMEO"><a  id="2" href="" data-toggle="modal" data-target="#modeloVehiculo"><img class="marcasautos"src="/autoparts_system/img/marcas/alfa_romeo.JPG" alt="Autopartes: Alfa Romeo" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="ALPINA"><a  id="65" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/alpina.jpg" alt="Autopartes: Alpina" width="100" height="100"></a></span>    

                            <span data-toggle="tooltip" data-placement="top" title="ASTON MARTIN"><a  id="3" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/aston_martin.jpg" alt="Autopartes: Aston ;Martin" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="AUDI"><a  id="4" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/audi.JPG" alt="Autopartes: Audi" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="BAW"><a  id="66" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/baw.jpeg" alt="Autopartes: BAW" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="BENTLEY"><a  id="5" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/bentley.png" alt="Autopartes: Bentley" width="100" height="100"></a></span>    

                            <span data-toggle="tooltip" data-placement="top" title="BMW"><a  id="6" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/bmw.JPG" alt="Autopartes: BMW" width="100" height="100"></a></span>        

                            <span data-toggle="tooltip" data-placement="top" title="BUGATTI"><a  id="67" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/bugatti.jpg" alt="Autopartes: Bugatti" width="100" height="100"></a></span>   

                            <span data-toggle="tooltip" data-placement="top" title="BUICK"><a  id="68" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/buick.jpg" alt="Autopartes: Buick" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="BYD"><a  id="69" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/byd.jpg" alt="Autopartes: BYD" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="CADILLAC"><a  id="7" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/cadillac.png" alt="Autopartes: Cadillac" width="100" height="100"></a></span>      

                            <span data-toggle="tooltip" data-placement="top" title="CHERY"><a  id="61" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/chery.JPG" alt="Autopartes: Chery" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="CHEVROLET"><a  id="8" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/chevrolet.JPG" alt="Autopartes: Chevrolet" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="CHRYSLER"><a  id="72" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/chrysler.JPG" alt="Autopartes: Chrisler" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="CITROEN"><a id="9" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/citroen.JPG" alt="Autopartes: Citroen" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="DACIA"><a  id="10" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/dacia.JPG" alt="Autopartes: Dacia" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="DAEWOO"><a id="62" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/daewoo.png" alt="Autopartes: Daewoo" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="DAF"><a id="73" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/daf.png" alt="Autopartes: DAF" width="100" height="100"></a></span>
                             
                            <span data-toggle="tooltip" data-placement="top" title="DAIHATSU"><a  id="74" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/daihatsu.JPG" alt="Autopartes: Daihatsu" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="DODGE"><a id="75" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/dodge.JPG" alt="Autopartes: Dodge" width="100" height="100"></a> </span> 

                            <span data-toggle="tooltip" data-placement="top" title="DS"><a id="76" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/ds.jpg" alt="Autopartes: DS" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="FAW"><a id="77" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/faw.jpg" alt="Autopartes: FAW" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="FERRARI"><a id="11" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/ferrari.jpg" alt="Autopartes: Ferrari" width="100" height="100"></a> </span> 

                            <span data-toggle="tooltip" data-placement="top" title="FIAT"><a id="12" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/fiat.JPG" alt="Autopartes: Fiat" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="FORD"><a id="13" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/ford.JPG" alt="Autopartes: Ford" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="GAZ"><a id="79" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/gaz.jpg" alt="Autopartes: GAZ" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="GEELY"><a id="80" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/geely.png" alt="Autopartes: Geely" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="GMC"><a id="81" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/gmc.jpg" alt="Autopartes: GMC" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="GREAT WALL"><a id="82" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/great_wall.jpg" alt="Autopartes: Great Wall" width="100" height="100"></a> </span> 

                            <span data-toggle="tooltip" data-placement="top" title="HAFEI"><a id="87" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/hafei.jpg" alt="Autopartes: Hafei" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="HONDA"><a id="14" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/honda.JPG" alt="Autopartes: Honda" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="HUMMER"><a id="88" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/hummer.jpg" alt="Autopartes: Hummer" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="HYUNDAI"><a id="52" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/hyundai.jpg" alt="Autopartes: Hyundai" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="INFINITI"><a id="15" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/infiniti.jpg" alt="Autopartes: Infiniti" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="ISUZU"><a id="16" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/isuzu.JPG" alt="Autopartes: Isuzu" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="IVECO"><a id="17" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/iveco.jpg" alt="Autopartes: IVECO" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="JAGUAR"><a id="18" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/jaguar.jpg" alt="Autopartes: Jaguar" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="JEEP"><a id="19" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/jeep.JPG" alt="Autopartes: Jeep" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="KIA"><a  id="20"href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/kia.jpg" alt="Autopartes: KIA" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="KTM"><a id="21" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/ktm.jpg" alt="Autopartes: KTM" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="LADA"><a id="22" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/lada.jpg" alt="Autopartes: Lada" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="LAMBORGHINI"><a id="23" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/lamborghini.jpg" alt="Autopartes: Lamborghini" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="LANCIA"><a id="24" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/lancia.jpg" alt="Autopartes: Lancia" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="LAND ROVER"><a id="25" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/land_rover.jpg" alt="Autopartes: Land rover" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="LEXUS"><a id="26" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/lexus.jpg" alt="Autopartes: Lexus" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="LIFAN"><a id="83" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/lifan.jpg" alt="Autopartes: Lifan" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="LOTUS"><a id="27" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/lotus.jpg" alt="Autopartes: Lotus" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="MASERATI"><a id="28" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/maserati.jpg" alt="Autopartes: Maserati" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="MAZDA"><a id="29" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/mazda.jpg" alt="Autopartes: Mazda" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="MERCEDES BENZ"><a id="30" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/mercedez-benz.JPG" alt="Autopartes: Mercedez Benz" width="100" height="100" ></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="MG"><a id="90" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/mg.jpg" alt="Autopartes: MG" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="MINI"><a id="31" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/mini.png" alt="Autopartes: Mini" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="MITSUBISHI"><a id="32" href=""><img class="marcasautos"src="/autoparts_system/img/marcas/mitsubishi.JPG" alt="Autopartes: Mitsubishi" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="MORGAN"><a id="33" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/morgan.jpg" alt="Autopartes: Morgan" width="100" height="100"></a>     </span> 

                            <span data-toggle="tooltip" data-placement="top" title="MOSKVICH"><a id="84" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/moskvich.jpg" alt="Autopartes: Moskvich" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="MUSTANG"><a id="53" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/mustang.jpg" alt="Autopartes: Mustang" width="100" height="100"></a> </span> 

                            <span data-toggle="tooltip" data-placement="top" title="NISSAN"><a id="34" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/nissan.JPG" alt="Autopartes: Nissan" width="100" height="100"></a>   </span> 

                            <span data-toggle="tooltip" data-placement="top" title="PEUGEOT"><a id="36" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/peugeot.JPG" alt="Autopartes: Peugeot" width="100" height="100"></a> </span>

                            <span data-toggle="tooltip" data-placement="top" title="PIAGGIO"><a id="37" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/piaggio.png" alt="Autopartes: Piaggio" width="100" height="100"></a> </span> 

                            <span data-toggle="tooltip" data-placement="top" title="PLYMOUTH"><a  id="91"href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/plymouth.jpg" alt="Autopartes: Plymouth" width="100" height="100"></a></span>  

                            <span data-toggle="tooltip" data-placement="top" title="PONTIAC"><a id="92" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/pontiac.png" alt="Autopartes: Pontiac" width="100" height="100"></a> </span>  

                            <span data-toggle="tooltip" data-placement="top" title="PORSCHE"><a id="38" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/Porsche.png" alt="Autopartes: Porsche" width="100" height="100"></a></span> 

                            <span data-toggle="tooltip" data-placement="top" title="RENAULT TRUCKS"><a id="85" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/renault_trucks.png" alt="Autopartes: Renault Trucks" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="RENAULT"><a id="39" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/renault.JPG" alt="Autopartes: Renault" width="100" height="100"></a></span>     

                            <span data-toggle="tooltip" data-placement="top" title="ROLLS ROYCE"><a id="40" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/rolls_royce.jpg" alt="Autopartes: Rolls Royce" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="ROVER"><a id="93" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/rover.jpg" alt="Autopartes: Rover" width="100" height="100"></a></span>        

                            <span data-toggle="tooltip" data-placement="top" title="SAAB"><a id="63" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/saab.jpg" alt="Autopartes: SAAB" width="100" height="100"></a></span>           

                            <span data-toggle="tooltip" data-placement="top" title="SHELBY"><a id="94" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/shelby.jpg" alt="Autopartes: Shelby" width="100" height="100"></a></span>   

                            <span data-toggle="tooltip" data-placement="top" title="SMART"><a id="43" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/smart.jpg" alt="Autopartes: Smart" width="100" height="100"></a></span>  

                            <span data-toggle="tooltip" data-placement="top" title="SKODA"><a id="42" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/skoda.png" alt="Autopartes: Skoda" width="100" height="100"></a></span>   

                            <span data-toggle="tooltip" data-placement="top" title="SUBARU"><a id="45" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/subaru_logo.jpg" alt="Autopartes: Subaru" width="100" height="100"></a></span>
                                         
                            <span data-toggle="tooltip" data-placement="top" title="SUZUKI"><a id="46" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/suzuki.jpg" alt="Autopartes: Suzuki" width="100" height="100"></a></span>  

                            <span data-toggle="tooltip" data-placement="top" title="TATA"><a id="47" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/tata.png" alt="Autopartes: TATA" width="100" height="100"></a></span>     

                            <span data-toggle="tooltip" data-placement="top" title="TESLA"><a id="48" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/tesla.jpg" alt="Autopartes: Tesla" width="100" height="100"></a></span>     

                            <span data-toggle="tooltip" data-placement="top" title="TOYOTA"><a id="49" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/toyota.JPG" alt="Autopartes: Toyota" width="100" height="100"></a></span>  

                            <span data-toggle="tooltip" data-placement="top" title="UAZ"><a id="95" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/uaz.png" alt="Autopartes: UAZ" width="100" height="100"></a></span>        

                            <span data-toggle="tooltip" data-placement="top" title="VAUXHALL"><a id="96" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/vauxhall.jpg" alt="Autopartes: Vauxhall" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="VOLVO"><a id="51" href="#"><img class="marcasautos"src="/autoparts_system/img/marcas/volvo.jpg" alt="Autopartes: Volvo" width="100" height="100"></a></span>       

                            <span data-toggle="tooltip" data-placement="top" title="VOLKSWAGEN"><a id="50" href="#"><img class="marcasautos" src="/autoparts_system/img/marcas/vw.JPG" alt="Autopartes: Volkswagen" width="100" height="100"></a></span>

                            <span data-toggle="tooltip" data-placement="top" title="ZAZ"><a id="86" href="#"><img class="marcasautos" src="/autoparts_system/img/marcas/zaz.jpg" alt="Autopartes: ZAZ" width="100" height="100"></a></span>
                        
                    </div>
                </div>
               
            <!-- MODAL MODELOS VEHICULOS -->

            <div class="modal fade" id="modeloVehiculo" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form role="form" method="post" id="modelos_vehiculos">
                                <h3>Seleccione el modelo de vehiculo solicitado:</h3>
                                <p class="text-danger float-right col-5"><small>*Tenga en cuenta el modelo y el año al momento de elegir.</small></p>
                                <input type="hidden" id="vehiculoid"> 
                                <p>
                                    <div class="form-group">
                                        <label>Modelo: </label>
                                       <select name="modelos" id="modelos">
                                           <option value="">--SELECCIONE--</option>
                                       </select>                        
                                    </div>                                    
                                </p>  
                                
                                                                
                                <button type="submit" class="btn btn-danger">Continuar</button>

                            </form>
                        </div> 

                    </div><!-- /.modal-content -->
                 </div><!--  /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Modal AGREGAR -->
             <div class="modal fade" id="nuevaCategoria" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>

                        <div class="modal-body">
                            <form role="form" method="post" id="agregar">
                                <h3>Ingrese la Nueva Categoria</h3>
                                <p>
                                    <div class="form-group">
                                        <label>Descripcion: </label>
                                        <input type="text" id="descripcion" style="text-transform:uppercase">                        
                                    </div>                                    
                                </p>    
                                                                
                                <button type="submit" class="btn btn-danger">Agregar</button>

                            </form>
                        </div> 

                    </div><!-- /.modal-content -->
                 </div><!--  /.modal-dialog -->
            </div><!-- /.modal AGREGAR -->

            

            <!-- Modal EDITAR-->
            <div class="modal fade" id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>

                        
                        <div class="modal-body">
                            <form role="form" method="post" id="editar-categoria">
                            <strong><h3>Modificar Categoria </h3></strong>
                                   
                                <input type="hidden" id="categoriaidedit" >
                                <p>
                                <div class="form-group">
                                <label>Descripcion:</label>
                                    <input type="text" id="descripcionedit"></input>                                   
                                </div>
                                </p>
                                                                
                                <button type="submit" class="btn btn-danger">Actualizar</button>

                            </form>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- - /.modal-dialog -->
            </div><!--/.modal EDITAR -->


        <!-- </div> -->


        <?php require "../../php/footer.php"; ?>
    </div> 

    
</body>
</html>