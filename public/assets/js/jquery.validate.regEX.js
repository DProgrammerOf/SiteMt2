jQuery.validator.addMethod("regEX", function(value, element, param) {
	return this.optional(element) || value.match(param);
});