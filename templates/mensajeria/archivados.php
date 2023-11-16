<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/dark-mode.css">
    <link rel="stylesheet" href="../bootstrap/css/light-mode.css">
    <link rel="stylesheet" href="../bootstrap/css/estilos.css">
    <!--Boostrap-->   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!--Boostrap--> 
</head>


<body id="body" class="dark-mode" style="margin: 3%;">
           
        
    
    
        <div class="floating-bar">
            <div class="row">
                <div class="col-2 text-center">
                    <p id="link"">Más</p>
                </div>
                <div class="col-8 text-center ">
                    <p>ChatPhone</p>
                </div>
                <div class="col-2">
                    <button type="button" name="dark_light" onclick="toggleDarkLight()" >
                        <svg id="change-theme" xmlns="http://www.w3.org/2000/svg" width="18" height="18"  class="bi bi-sun" viewBox="0 0 16 16">
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                          </svg>
                    </button>
    
                </div>
            </div>
        </div>
    
    
    
        <div class="floating-bar-bottom">
            <div class="row text-center">
                <div class="col-3">
                    <a href="no_leidos.php" class="a">
                    <svg  id="icon_bar" xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-bookmark-dash" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5.5 6.5A.5.5 0 0 1 6 6h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                      </svg>
                      <p id="icon_bar"  style="font-size: 10px;">No leidos</p>
                    </a>
                </div>
        
    
                <div class="col-3">
                    <a href="archivados.php" class="a">
                    <svg    fill="#0a85f0"  xmlns="http://www.w3.org/2000/svg" width="20" height="20"  class="bi bi-archive" viewBox="0 0 16 16">
                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                      <p   style="font-size: 10px; color: #0a85f0;">Archivados</p>
                    </a>
                </div>
    
    
                <div class="col-3">
                    <a href="index.php" class="a">
                    <svg  id="icon_bar" xmlns="http://www.w3.org/2000/svg" width="20" height="20"  class="bi bi-chat" viewBox="0 0 16 16">
                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                      </svg>
                      <p  id="icon_bar" style="font-size: 10px; ">Chats</p>
                    </a>
                </div>
         
    
                <div class="col-3">
                    <a href="configuracion.php" class="a">
                    <svg id="icon_bar"  xmlns="http://www.w3.org/2000/svg" width="20" height="20"  class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                        <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
                      </svg>
                      <p id="icon_bar"  style="font-size: 10px;">Configuración</p>
                    </a>
                </div>
            </div>
        </div>
    
    
        <div id="container" class="visible" style="margin-top: 60px;">
           <h1 id="chats">Archivados</h1>
           <input  id="search" type="text"  placeholder="Buscar">
        </div>
    
        <div>
    
    
            <div class="row text-center " id="link">
                <div class="col-6" id="link">
                   Chats Archivados (5)
                </div>
                <div class="col-6">
                    Nuevo grupo
                </div>
             </div>
    
    <br>
    
    <!--Lista de chats-->
<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>

<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>


<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>


<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>


<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>


<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>


<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>


<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>



<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>


<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>


<div class="chat-container">
    <img class="profile-image" src="https://avatars.githubusercontent.com/u/74835918?s=48&v=4" alt="Perfil Chat 1">
    <div class="chat-content text-truncate">
        <div class="chat-header">
            <h2 class="text-truncate" id="nombrechat">Nombre de chat 1</h2>
            <div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">10:30 AM</div>
        </div>
        <div class="text-truncate" id="mensajechat" >Mensaje del chat 1jlkhjklhhjkhlkjhklhjklhkjlhljkkjhljkhljh..</div>
    </div>
</div>


<!--Lista de chats-->
    
    
    
    
              
        </div>
    
       
        
        
        
        
        
        
        
        
        
        
    <br><br>
    
    
    
    
    
    
    
    
    
    
    
    
    
        <script src="../bootstrap/js/script.js"></script>

</html>