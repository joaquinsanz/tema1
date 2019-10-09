public function delete(){
    if (isset($_GET[$key])){
        unset($_SESSION['lista'][$key]);
        header (Location: ?metod=home)
    }
}

esto lo pasas con un li en la vista y con un enlace a href=""

Falta que los guarde en la sesion solucionar problema index,