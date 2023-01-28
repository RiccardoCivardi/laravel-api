function truncateText(text, textMaxLength) {
    if(text.length < textMaxLength) return text
    return text.substring(0, textMaxLength) + '...';
}

const formatDate = (data) => {

    let newData = data.slice(0,10);
    newData = newData.split('-').reverse().join('/');
    return newData;
}
const toUpperCase = (text) => {
    return text.toUpperCase();
}

export {truncateText, formatDate, toUpperCase};
