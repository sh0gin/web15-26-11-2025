$(() => {
    const text = 'Люблю путешествовать! :)';
    const elem = $(".main-elem");
    let i = 0;
    function typeWrite() {
        if (i < text.length) {
            elem.html(`${elem.html()}${text.charAt(i)}`);
            i++;
            setTimeout(typeWrite, 300);
        } else {
            setTimeout(() => {
                elem.html("");
                i=0
                typeWrite()
            }, 1500)
        }
    }; typeWrite()
});