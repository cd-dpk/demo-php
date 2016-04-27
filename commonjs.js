function loadCommon(){
	var element = document.getElementById("upper");
	element.width ="100%";
	element.align ="center";
	createLink(element,"index.php","Home");
	createLink(element,"categories.php","Category");
	createLink(element,"products.php","Product");
	createLink(element,"invoices.php","Invoice");
	createLink(element,"orders.php","Orders");
	createLink(element,"merge.php","Invoice&Orders");
}
function createLink(div,link, text){
	var para = document.createElement("a");
	para.href= link;
	var node = document.createTextNode(text);
	para.appendChild(node);
	div.appendChild(para);

}