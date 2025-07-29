const Button = document.getElementById('addProduct');
const category = document.getElementById('category');
const brand = document.getElementById('brand');
const title = document.getElementById('title');
const price = document.getElementById('price');
const desc = document.getElementById('desc');
const image = document.getElementById('image');
const key = document.getElementById('keyword');
const stock = document.getElementById('stock');

Button.addEventListener('click', (e)=> {	
	addProduct(e);
});

const addProduct = (e) =>{
    const catValue = category.value.trim();
    const brandValue = brand.value.trim();
    const titleValue = title.value.trim();
    const priceValue = price.value.trim();
    const descValue = desc.value.trim();
    const imageValue = image.value.trim();
    const keyValue = key.value.trim();
    const stockValue = stock.value.trim();

    if(catValue === 'Select Product Category') {
		setEmptyFor(category, 'Category cannot be blank');
		e.preventDefault();
	}else{
		setNotEmptyFor(category);
	}

	if(brandValue === 'Select Product Brand'){
		setEmptyFor(brand, 'Brand cannot be blank');
		e.preventDefault();
	} else{
		setNotEmptyFor(brand);
	}

	if(titleValue === ''){
		setEmptyFor(title, 'Title cannot be blank');
		e.preventDefault();
	}else{
		setNotEmptyFor(title);
	}

	if(priceValue === ''){
		setEmptyFor(price, 'Price cannot be blank');
		e.preventDefault(); 
	}else if(!isPrice(priceValue)){
		setEmptyFor(price, 'Input must be number or decimal eg: 100 or 1.23');
		e.preventDefault();
	} else{
		setNotEmptyFor(price);
	}

	if(descValue === ''){
		setEmptyFor(desc, 'Description cannot be blank');
		e.preventDefault();
	} else{
		setNotEmptyFor(desc);
	}

	if(imageValue === ''){
		setEmptyFor(image, 'Select Product Image');
		e.preventDefault();
	} else{
		setNotEmptyFor(image);
	}

	if(keyValue === ''){
		setEmptyFor(key, 'Keyword cannot be blank');
		e.preventDefault();
	}else{
		setNotEmptyFor(key);
	}

    if(stockValue === ''){
		setEmptyFor(stock, 'In stock cannot be blank');
		e.preventDefault();
	}else if(!isStock(stockValue)){
		setEmptyFor(stock, 'Input must be a number');
		e.preventDefault();
	}else{
		setNotEmptyFor(stock);
	}

	if(catValue !== '' && brandValue !== '' && titleValue !== '' && priceValue !== '' && descValue !== '' && imageValue !== '' && keyValue !== '' && stockValue !== ''){
		Loader();
		Loader.show();
		alert("Products Have Been Added");
	}

}




function setEmptyFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-element error';
	small.innerText = message;
}

function setNotEmptyFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-element success';
}

function isFormat(text){
	return /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*$/.test(text);
}


function isStock(input){
	return /^0*[0-9][0-9]*$/.test(input);
}


function isPrice(input){
	return /\d+((,\d+)+)?(.\d+)?(.\d+)?(,\d+)?/.test(input);
}

