<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class = "back">


              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    
                    <h3 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-shopping-cart"></i> <strong><? echo $id; ?></strong> - <? echo $name; ?> </h3>
                  </div>
                  <div class="modal-body">
                  
                    <table class="pull-left col-md-8 ">
                         <tbody>
                             <tr>
                                 <td class="h5"><strong>ID</strong></td>
                                 <td> </td>
                                 <td class="h4"><? echo $id; ?></td>
                             </tr>
                             
                             <tr>
                                 <td class="h2"><strong>&nbsp;</strong></td>
                                 <td> </td>
                                 <td class="h2">&nbsp;</td>
                             </tr>  
                             
                             <tr>
                                 <td class="h5"><strong>Name</strong></td>
                                 <td> </td>
                                 <td class="h4"><? echo $name; ?></td>
                             </tr>
                             
                             <tr>
                                 <td class="h2"><strong>&nbsp;</strong></td>
                                 <td> </td>
                                 <td class="h5">&nbsp;</td>
                             </tr> 
                             
                             <tr>
                                 <td class="h5"><strong>Owner</strong></td>
                                 <td> </td>
                                 <td class="h4"><? echo $username; ?></td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Número Original</strong></td>
                                 <td> </td>
                                 <td class="h5">0230316</td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Código N.C.M</strong></td>
                                 <td> </td>
                                 <td class="h5">032165</td>
                             </tr>
                             
                             <tr>
                                 <td class="h6"><strong>Código de Barras</strong></td>
                                 <td> </td>
                                 <td class="h5">0321649843</td>
                             </tr>  

                             <tr>
                                 <td class="h6"><strong>Unid. por Embalagem</strong></td>
                                 <td> </td>
                                 <td class="h5">50</td>
                             </tr>                            

                             <tr>
                                 <td class="h6"><strong>Quantidade Mínima</strong></td>
                                 <td> </td>
                                 <td class="h5">50</td>
                             </tr>

                             <tr>
                                 <td class="h6"><strong>Preço Atacado</strong></td>
                                 <td> </td>
                                 <td class="h5">R$ 35,00</td>
                             </tr> 
                            
                             <tr>
                                 <td class="h5"></td>
                             </tr> 

                         </tbody>
                    </table>
                             
                         
                    <div class="col-md-4"> 
                        <img src="../../../../productPic/<? echo $pic1; ?>.jpg" alt="teste" class="img-thumbnail">  
                    </div>
                    
                    <div class="clearfix"></div>
                   <p class="open_info hide"></p>
                  </div>
                    
                  <div class="modal-footer">       
                      
                    <div class="text-right pull-right col-md-3">
                        Varejo: <br/> 
                        <span class="h3 text-muted"><strong> R$50,00 </strong></span></span> 
                    </div> 
                      
                    <div class="text-right pull-right col-md-3">
                        Atacado: <br/> 
                        <span class="h3 text-muted"><strong>R$35,00</strong></span>
                    </div>
                     
                </div>
              </div>
            </div>
     
</div>
</body>
</html>