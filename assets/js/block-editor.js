wp.domReady(function () {
  
  // Button styles
  wp.blocks.unregisterBlockStyle("core/button", ["fill", "outline"]);
  wp.blocks.registerBlockStyle("core/button", {
    name: "blue",
    label: "Blue",
    isDefault: true,
  });
  wp.blocks.registerBlockStyle("core/button", {
    name: "white",
    label: "White",
  });
  wp.blocks.registerBlockStyle("core/button", {
    name: "red",
    label: "Red",
  });
});

//  Add animation control to blocks
const blocksToAddAnimation = ['core/paragraph', 'core/heading', 'core/image'];

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'custom/paragraph-animation-class',
  function(settings, name) {
    if (!blocksToAddAnimation.includes(name)) {
      return settings;
    }

    return lodash.assign({}, settings, {
      attributes: lodash.assign({}, settings.attributes, {
        animationDirection: {
          type: 'string',
          default: '',
        },
      }),
    });
  }
);

wp.hooks.addFilter(
  'editor.BlockEdit',
  'custom/add-animation-control',
  wp.compose.createHigherOrderComponent(function(BlockEdit) {
    return function(props) {
      var el = wp.element.createElement;
      var RadioControl = wp.components.RadioControl;
      var Fragment = wp.element.Fragment;
      var InspectorControls = wp.blockEditor.InspectorControls;
      var PanelBody = wp.components.PanelBody;

      if (!blocksToAddAnimation.includes(props.name)) {
        return el(BlockEdit, props);
      }

      var updateAnimationDirection = function(newDirection) {
        props.setAttributes({ animationDirection: newDirection });
      };

      return el(Fragment, {},
        el(BlockEdit, props),
        el(InspectorControls, {
          group: 'styles'
        },
          el(PanelBody, { title: 'Animation', initialOpen: false },
            el(RadioControl, {
              label: 'Animation Direction',
              selected: props.attributes.animationDirection,
              options: [
                { label: 'None', value: '' },
                { label: 'Animate Up', value: 'animated-up' },
                { label: 'Animate Down', value: 'animated-down' },
                { label: 'Animate Left', value: 'animated-left' },
                { label: 'Animate Right', value: 'animated-right' },
              ],
              onChange: updateAnimationDirection
            })
          )
        )
      );
    };
  }, 'withAnimationControl')
);

wp.hooks.addFilter(
  'blocks.getSaveContent.extraProps',
  'custom/add-animation-class',
  function(extraProps, blockType, attributes) {
    if (!blocksToAddAnimation.includes(blockType.name)) {
      return extraProps;
    }

    var animationDirection = attributes.animationDirection;
    if (animationDirection) {
      extraProps.className = (extraProps.className || '') + ' ' + animationDirection;
    }

    return extraProps;
  }
);


/* GSAP
========================================================= */

var animatedElements = gsap.utils.toArray(".animated-left, .animated-right, .animated-up, .animated-down");
animatedElements.forEach(function (element) {
  gsap.set(element, { opacity: 1 });
  gsap.from(element, {
    opacity: 0,
    x: element.classList.contains("animated-left") ? -20 : element.classList.contains("animated-right") ? 20 : 0,
    y: element.classList.contains("animated-up") ? -20 : element.classList.contains("animated-down") ? 20 : 0,
    duration: 0.5,
    ease: "back.out(2)",
    delay: 0,
    transformOrigin: 'center center',
    scrollTrigger: {
      trigger: element,
      start: "top 90%",
    },
  });
});
