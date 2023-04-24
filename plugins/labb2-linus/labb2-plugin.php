<?php

/*

Plugin Name: Labb2 plugin
Description: Plugin för att växla mellan ljust och mörkt färgtema

*/

if (!is_admin()) {
    //Wrappar upp hela plugin:et så att det inte gäller i Adminpanelen
    function labb2_css_button()
    {
        echo "
    <style type='text/css'>

    .button_container_plugin {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        padding-top: 25px;
        padding-right: 35px;
        
    }

    .labb2_button {
        all: unset;
        cursor: pointer;
        font-size: 1.5rem;
        
      }
    .remove_labb2_button {
        
            all: unset;
            cursor: pointer;
            font-size: 1.5rem;
    }
    a.button.wp-element-button.product_type_variable.add_to_cart_button {

        color: #43454b;
    }
    a.checkout-button.button.alt.wc-forward.wp-element-button {

        background-color: green;
       
        }
    </style>

    ";
    }

    add_action('init', 'labb2_css_button');

    //Sätter css för plugin knapparna som man ska använda för att skifta mellan färgtemat
    function labb2_css()
    {
        echo "

    <style type='text/css'>
    .button_container_plugin {
        
        background-color: rgb(41, 41, 41);
        
    }
    .labb2_button {
        all: unset;
        cursor: pointer;
        color: white;
        font-size: 1.5rem;
        
      }
    .remove_labb2_button {
        
            all: unset;
            cursor: pointer;
            color: white;
            font-size: 1.5rem;
    }
    .main-navigation ul li a {

        color: white;
        
        }
     h1, h2, h3, h4, h5, h6{

        color: white;
        
        }
        #page {
            color: white;
        }
        .menu2{
            color: white;
        }

        .woocommerce-Price-currencySymbol {

         color: white;
            }
            
        .woocommerce-Price-amount {
            color: white;
            }
            .count{
                color: white;
            }
            a.cart-contents::after {

                color: orange;
                
                }
 a.button.wp-element-button.product_type_variable.add_to_cart_button {

    color: #43454b;
}

button.single_add_to_cart_button.button.alt.wp-element-button{
    background-color: white;
    color: #43454b;
}
a.checkout-button.button.alt.wc-forward.wp-element-button {

     background-color: green;
    
     }

    #masthead {
        background-color: rgb(41, 41, 41);
        color: white;
    }    
    #page {
        background-color: rgb(41, 41, 41);
    }
    #colophon {
        background-color: rgb(41, 41, 41);
        color: rgb(172, 172, 172);
    }
    a {
        color: white;
    }
    </style>

    ";
    }

    //Sätter inställningar för det mörka färgtemat
    function activate_labb2_css()
    {
        setcookie('labb2_css', '1', time() + 3600 * 24 * 30, '/');
        add_action('wp_head', 'labb2_css');
    }
    function deactivate_labb2_css()
    {
        setcookie('labb2_css', '', time() - 3600, '/');
        unset($_COOKIE['labb2_css']);
    }
    if (isset($_POST['labb2_button'])) {
        activate_labb2_css();
    } elseif (isset($_POST['remove_labb2_button'])) {
        deactivate_labb2_css();
    }
    if (isset($_COOKIE['labb2_css'])) {
        add_action('wp_head', 'labb2_css');
    }
?>
    <!-- Skapar knappar som ska kunna byta färg på webbsidan -->

    <div class="button_container_plugin">
        <form method="post">

            <input type="hidden" name="labb2_button" value="1" />
            <button type="submit" class="labb2_button" onclick="event.stopPropagation();"><i class="fa-regular fa-moon"></i></button>

        </form>


        <form method="post">

            <input type="hidden" name="remove_labb2_button" value="1" />
            <button type="submit" class="remove_labb2_button" onclick="event.stopPropagation();"><i class="fa-solid fa-sun"></i></button>

        </form>
    </div>

    <script src="https://kit.fontawesome.com/1673120fba.js" crossorigin="anonymous"></script>
<?php
}
?>