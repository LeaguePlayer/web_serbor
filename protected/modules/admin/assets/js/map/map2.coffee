class Map
	constructor: ->
		@mapId = '#map'
		@canvas = $(@mapId)
		@img = $('#image')
		@container = $('#mapContainer')

	init: () ->
		ctx = @.getCtx()
		c = @canvas
		console.log @ctx
		@img[0].onload = () ->
			c[0].width = @.width
			c[0].height = @.height
			ctx.drawImage(@,0,0)

		# scroll mousewheel
		step = 200
		@container.on 'mousewheel', (e) ->
			console.log(e.deltaX, e.deltaY, e.deltaFactor)
			w = $(@).width()
			c.width(w + (e.deltaY * step))
		# c.onmousewheel = (e) ->
		# 	mousex = e.clientX - c.offsetLeft
		# 	mousey = e.clientY - c.offsetTop
		# 	wheel = e.wheelDelta/120

		# 	zoom = 1 + wheel/2

		# 	console.log 'asd'

		# 	ctx.translate(originx, originy)
		# 	ctx.scale(zoom,zoom);
		# 	ctx.translate(
		# 	    -( mousex / scale + originx - mousex / ( scale * zoom ) ),
		# 	    -( mousey / scale + originy - mousey / ( scale * zoom ) )
		# 	)

		# 	originx = ( mousex / scale + originx - mousex / ( scale * zoom ) )
		# 	originy = ( mousey / scale + originy - mousey / ( scale * zoom ) )
		# 	scale *= zoom

		# console.log @img
	getCtx: () ->
		@ctx = @canvas[0].getContext('2d') if !@ctx
		return @ctx


$(document).ready () ->
	m = new Map()
	m.init()