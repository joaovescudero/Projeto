<form name="form_login" id="form_login" method="post" action="http://gf.ignitgames.to/">
                <h2 class="hidden">Login</h2>
                <label for="login_password" class="hidden">Usuario</label>
                <input name="login_username" id="login_username" type="text" maxlength="16" value="" placeholder="usuario" style="outline:none;" />
                <label for="login_password" class="hidden">Contrase&ntilde;a</label>
                <input name="login_password" id="login_password" type="password" maxlength="16" value="" placeholder="contrase&ntilde;a" style="outline:none;" />
                <label for="login_captcha" class="hidden">Codigo de Seguridad</label>
                <input name="login_captcha" id="login_captcha" type="text" maxlength="6" value="" placeholder="codigo" style="outline:none;" autocomplete="off" />
                <div id="box_captcha">
                  <span>Escribe los siguientes caracteres:</span>
                  <img id="captchal" align="absmiddle" alt="Captcha" src="http://gf.ignitgames.to/captcha.php">
                </div>
                <input type="submit" id="login_submit" class="button login" value="IR" />
                <a href="#" id="loginsendpw" class="button bone retrieve">Recuperar Clave</a>
              </form>