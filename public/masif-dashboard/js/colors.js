const softColor=['#FAA255', '#F0C348', '#E27CF1', '#F562AC', '#EB5959', '#9EE67A', '#50D989', '#66CFF2', '#7F7CE6']
function shuffle(array) {
    var currentIndex = array.length, randomIndex;
    while (currentIndex != 0) {
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex--;
        [array[currentIndex], array[randomIndex]] = [
            array[randomIndex], array[currentIndex]];
    }
    return array;
}
const randomColor = shuffle(softColor);

// export {randomColor, softColor};
