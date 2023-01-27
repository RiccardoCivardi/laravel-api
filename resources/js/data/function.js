function truncateText(text, textMaxLength) {
    if(text.length < textMaxLength) return text
    return text.substring(0, textMaxLength) + '...';
}

const formatDate = (data) => {

    let newData = data.slice(0,9);
    newData = newData.split('-').reverse().join('/');
    return newData;
}

export {truncateText, formatDate};
