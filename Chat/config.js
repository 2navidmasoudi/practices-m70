// change this if u are using alternative server for php
const ALT_SERVER = false;
// change this to php server port
const ALT_PORT = "8080";

let url = "";

if (ALT_SERVER) {
    url = "http://127.0.0.1:" + ALT_PORT;
}

export default url;