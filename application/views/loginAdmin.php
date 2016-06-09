
        <div class="form-box" id="login-box">
            <div class="header">Entrar</div>
            <form action="<?php echo site_url('admin/procesar');?>" method="post">
                <div class="body bg-gray">
                	<p><?php echo (isset($message)) ? $message : "" ?></p>
                    <div class="form-group">
                        <input class="form-control" type="text" title="username" name="username" placeholder="Nombre de usuario" required />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" title="password" name="password" placeholder="Contraseña" required />
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Entrar</button>  
                </div>
            </form>
        </div>