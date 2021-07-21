import {render} from "react-dom";
import React from "react";

function Prescription(){
    return <div>Bonjour tout le monde</div>
}

class PrescriptionElement extends HTMLElement {

    connectedCallback(){
        render(<Prescription/>, this)
    }

}

customElements.define('post-prescriptions', PrescriptionElement)