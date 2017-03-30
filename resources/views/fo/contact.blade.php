@extends('fo.octagon_layout.octagon_master')

@section('content')

<div class="col-md-12 w-100">
    <div class="contact bg-box-shadow">
        <div class="contact-logo text-center">
            <i class="pe-7s-mail"></i>
            <p>Envia'ns el teu Missatge</p>
        </div>
        <!-- End Contact Logo -->

        <!-- ___Start Contact Form___ -->
        <div class="contact-form">
            <div class="row">
                <form>
                   <row>
                    <!-- ___Input .Name .Email. Website___ -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nom (*)</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="surname">Cognoms (*)</label>
                            <input type="text" class="form-control" id="surname" name="surname" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email (*)</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <!-- End Column 6 -->

                    <!-- ___Message & Send It___ -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="empresa">Empresa</label>
                            <input type="text" class="form-control" id="empresa" name="empresa">
                        </div>
                        
                        <div class="form-group">
                            <label for="direccion">Adreça</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                    </div>
                    <!-- End Column 6 -->
                    </row>
                    <row>
                        <!-- ___Message & Send It___ -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message">Missatge</label>
                            <textarea class="form-control" rows="7" id="message" name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button btn btn-default">Enviar</button>
                        </div>
                    </div>
                    <!-- End Column 6 -->
                    </row>
                </form>
                <!-- End Form -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Contact Form -->

        <!-- ___Start Address___ -->
        <div class="row">
            <div class="contact-address text-center">
                <div class="col-md-4 col-sm-4 address-width">
                    <i class="pe-7s-map-2"></i>
                    <p>123 Web Street, Melbourne, <br>Australia.</p>
                </div>

                <div class="col-md-4 col-sm-4 address-width">
                    <i class="pe-7s-mail-open-file"></i>
                    <p>info@octagon.com</p>
                </div>

                <div class="col-md-4 col-sm-4 address-width">
                    <i class="pe-7s-phone"></i>
                    <p>+66 (0) 123 456 7890 <br> +66 (0) 123 456 8097</p>
                </div>

            </div>
        </div>
        <!-- End Row -->

        <!-- ___Start Social Media Following___ -->
        <div class="row">
            <ul class="ul-clearfix">
                <li>
                    <div class="col-md-3 col-sm-6 col-xs-12 social-width">
                        <a class="connect-with-us facebook">
                            <i class="fa fa-facebook"></i>
                            <span>Follow</span>
                            <div class="plus">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                        <!-- End Facebook -->
                    </div>
                </li>

                <li>
                    <div class="col-md-3 col-sm-6 col-xs-12 social-width">
                        <a class="connect-with-us google-plus">
                            <i class="fa fa-google-plus"></i>
                            <span>Follow</span>
                            <div class="plus">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                        <!-- End Google Plus -->
                    </div>
                </li>

                <li>
                    <div class="col-md-3 col-sm-6 col-xs-12 social-width">
                        <a class="connect-with-us twitter">
                            <i class="fa fa-twitter"></i>
                            <span>Follow</span>
                            <div class="plus">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                        <!-- End Twitter -->
                    </div>
                </li>
                <li>
                    <div class="col-md-3 col-sm-6 col-xs-12 social-width">
                        <a class="connect-with-us linkedin">
                            <i class="fa fa-linkedin"></i>
                            <span>Follow</span>
                            <div class="plus">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                        <!-- End Linkedin -->
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Contact -->
</div>

@endsection
