<form method="POST" action="<?=site_url('/login');?>">


<!--pesan error login -->



<p>Username<br/>
    <input type="text" name="txtUser"/>
</p>

<p>Password<br/>
    <input type="password" name="txtPass"/>
</p>

<p>
    <button type="submit">Login</button>
</p>

</form>

<?=session()->getFlashData('info');?>