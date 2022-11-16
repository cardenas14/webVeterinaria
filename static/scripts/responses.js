function getBotResponse(input) {
    
    if (input == "1") {
        return "Las citas se hacen por reservacion en nuestra pestaña de servicios, todos nuestros especialistas estan listos para recibirte :)";
    } else if (input == "2") {
        return "Nuestros productos son de gran calidad y son lo mejor para tu amigo peludo";
    } else if (input == "3") {
        return "Nuestro numero de contacto es 993 672 090";
    } else if (input== "Amo los animales<3"){
        return "Y ellos a ti<3";
    }else if (input =="<3"){
        return "<3";
    }else if (input =="ok"){
        return "ok";
    }else if (input =="adios"){
        return "Que tengas un buen dia";
    }else if (input =="gracias"){
        return "gracias a ti";
    }else if (input =="4"){
        return "Nos encuentran en facebook como: <br> @AnimalCenterElAgustino ";
    }else
        return "Intenta con los números";
    }