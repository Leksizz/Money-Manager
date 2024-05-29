import('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css').then((css) => {
    const style = document.createElement('style');
    style.textContent = css.default;
    document.head.appendChild(style);
});
