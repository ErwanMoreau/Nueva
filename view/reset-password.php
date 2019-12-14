<?php
if( isset($_SESSION['acces'])){
    header('Location: index.php?id=3');
}
?>

<div class="container h-100 mt-5">
  <div class="d-flex justify-content-center h-100">
    <div class="user_card customPos">
      <div class="d-flex justify-content-center">
        <div class="brand_logo_container">
          <img src="./image/logo.png" class="brand_logo" >
        </div>
      </div>
      <div class="d-flex justify-content-center form_container">
        <form action="index.php?id=101" method="POST">
         
          <div class="input-group mb-2">
            <div class="input-group-append">
              <span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="25px" height="25px" class=""><g><g>
                    <g>
                      <path d="M463.748,48.251c-64.336-64.336-169.013-64.335-233.349,0.001c-43.945,43.945-59.209,108.706-40.181,167.461    L4.396,401.536c-2.813,2.813-4.395,6.621-4.395,10.606V497c0,8.291,6.709,15,15,15h84.858c3.984,0,7.793-1.582,10.605-4.395    l21.211-21.226c3.237-3.237,4.819-7.778,4.292-12.334l-2.637-22.793l31.582-2.974c7.178-0.674,12.847-6.343,13.521-13.521    l2.974-31.582l22.793,2.651c4.233,0.571,8.496-0.85,11.704-3.691c3.193-2.856,5.024-6.929,5.024-11.206V363h27.422    c3.984,0,7.793-1.582,10.605-4.395l38.467-37.958c58.74,19.043,122.381,4.929,166.326-39.046    C528.084,217.266,528.084,112.587,463.748,48.251z M421.313,154.321c-17.549,17.549-46.084,17.549-63.633,0    s-17.549-46.084,0-63.633s46.084-17.549,63.633,0S438.861,136.772,421.313,154.321z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
                    </g>
                  </g></g> 
                </svg>
              </span>
            </div>
            <input type="password" id="oldPassword" name="oldPassword" class="form-control input_pass"  placeholder="ancien mot de passe">
          </div>
          <div class="input-group mb-2">
            <div class="input-group-append">
              <span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="25px" height="25px" class=""><g><g>
                    <g>
                      <path d="M463.748,48.251c-64.336-64.336-169.013-64.335-233.349,0.001c-43.945,43.945-59.209,108.706-40.181,167.461    L4.396,401.536c-2.813,2.813-4.395,6.621-4.395,10.606V497c0,8.291,6.709,15,15,15h84.858c3.984,0,7.793-1.582,10.605-4.395    l21.211-21.226c3.237-3.237,4.819-7.778,4.292-12.334l-2.637-22.793l31.582-2.974c7.178-0.674,12.847-6.343,13.521-13.521    l2.974-31.582l22.793,2.651c4.233,0.571,8.496-0.85,11.704-3.691c3.193-2.856,5.024-6.929,5.024-11.206V363h27.422    c3.984,0,7.793-1.582,10.605-4.395l38.467-37.958c58.74,19.043,122.381,4.929,166.326-39.046    C528.084,217.266,528.084,112.587,463.748,48.251z M421.313,154.321c-17.549,17.549-46.084,17.549-63.633,0    s-17.549-46.084,0-63.633s46.084-17.549,63.633,0S438.861,136.772,421.313,154.321z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
                    </g>
                  </g></g> 
                </svg>
              </span>
            </div>
            <input type="password" id="neawPassword" name="NewPassword" class="form-control input_pass"  placeholder="nouveaux mot de passe">
          </div>
          <div class="input-group mb-2">
            <div class="input-group-append">
              <span class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="25px" height="25px" class=""><g><g>
                    <g>
                      <path d="M463.748,48.251c-64.336-64.336-169.013-64.335-233.349,0.001c-43.945,43.945-59.209,108.706-40.181,167.461    L4.396,401.536c-2.813,2.813-4.395,6.621-4.395,10.606V497c0,8.291,6.709,15,15,15h84.858c3.984,0,7.793-1.582,10.605-4.395    l21.211-21.226c3.237-3.237,4.819-7.778,4.292-12.334l-2.637-22.793l31.582-2.974c7.178-0.674,12.847-6.343,13.521-13.521    l2.974-31.582l22.793,2.651c4.233,0.571,8.496-0.85,11.704-3.691c3.193-2.856,5.024-6.929,5.024-11.206V363h27.422    c3.984,0,7.793-1.582,10.605-4.395l38.467-37.958c58.74,19.043,122.381,4.929,166.326-39.046    C528.084,217.266,528.084,112.587,463.748,48.251z M421.313,154.321c-17.549,17.549-46.084,17.549-63.633,0    s-17.549-46.084,0-63.633s46.084-17.549,63.633,0S438.861,136.772,421.313,154.321z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/>
                    </g>
                  </g></g> 
                </svg>
              </span>
            </div>
            <input type="password" id="confirmPassword" name="ConfirmNewpassword" class="form-control input_pass"  placeholder="Confirmer le mot de passe">
          </div>
          <input type="hidden" name="id_user" value="<?= $_GET['id_user'] ?>">
          <input type="hidden" name="token" value="<?= $_GET['token'] ?>">
          <div class="d-flex justify-content-center mt-5 login_container ">
            <button type="submit" name="button" class="btn login_btn">Reset password</button>
          </div>
        </form>
      </div>


    </div>
  </div>
</div>
