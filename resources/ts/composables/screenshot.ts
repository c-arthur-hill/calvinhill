import html2canvas from "html2canvas";

export default function useScreenShot(url, id)
{
    return new Promise((resolve) => {
        let newTab = window.open(url, '_blank');
        newTab.onload = (event) => {
            html2canvas(event.target.querySelector(id))
                .then(canvas => {
                    event.currentTarget.close();
                    resolve(canvas.toDataURL('image/png'));
                });
            };
    });
}
