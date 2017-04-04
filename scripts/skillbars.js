$(document).ready(function() {
    $.each( $('.skillbar'), function(index, el) {
        var barWidth = $(el).attr('data-rating') * 10;
        
        $(el).css({
            width: barWidth+'%'
        });
    });
})

var editMode = false;


// Swtich edit mode on / off
$('#edit-mode-check').change(function() {
    if ( editMode == false ) {
        editMode = true;
        $('ul').css({
            cursor: 'pointer'
        })
        
        $('#form_about').css({display: 'block'});
        $('#about-p').css({display: 'none'});
    } else {
        editMode = false;
        $('ul').css({
            cursor: 'auto'
        });
        
        $('#form_about').css({display: 'none'});
        $('#about-p').css({display: 'block'});
    }
    
    
    
})



// For editing dot rating
$('.skills-bubble').mouseover(function() {
  if (editMode == true){
      var dotIndex = $(this).index();
      $(this).css('background-color', 'black');
      
      $.each($(this).siblings(), function(index, dot) {
        if( $(dot).index() <= dotIndex ) {
          $(dot).css('background-color', 'black');
        } else if ( $(dot).index() > dotIndex ) {
          $(dot).css('background-color', 'white');
        }
        
      })      
  }
});


$('.skills-bubble').click(function() {
    if (editMode == true) {
        var hiddenInput = $('input[data-list="'+$(this).parent().attr('id')+'"]');
        $('input[data-list="'+$(this).parent().attr('id')+'"]').val( $(this).index()+1 );
        hiddenInput.trigger('change');        
    }
});


$('.skills-bubble-lst').mouseleave(function() {
    if (editMode == true) {
        $.each( $(this).children(), function(index, dot) {
            var rating = $('input[data-list="'+$(this).parent().attr('id')+'"]').val();
            
            if( $(dot).index() < rating ) {
                $(dot).css('background-color', 'black');
            } else {
                $(dot).css('background-color', 'white');
            }
        });
    }

});

// When any rating is changed
$('.rating-hidden').change(function() {
    var id = $(this).attr('data-id');
    var rating = $(this).val();
    
    changeSkillRating(id, rating);
})

// END dot rating editing


// Makes the delete icons appear when hovering over table row
$('.skill-tr').mouseenter(function() {
    if (editMode == true) {
        var deleteIcon = $(this).find('.skill-delete');
        $(deleteIcon).css({
            display: 'inline'
        })
    }
});

// Makes the delete icons disappear when hovering over table row
$('.skill-tr').mouseleave(function() {
    if (editMode == true) {
        var deleteIcon = $(this).find('.skill-delete');
        $(deleteIcon).css({
            display: 'none'
        })        
    }
});



// For changing skill bars
$(".skillbar-container").mousemove(function(e){
    if (editMode == true) {
        var childId = $(this).children('.skillbar').attr('id');
        
        
        var staticWidth = $('input[data-list="'+childId+'"]').val();
    
        var parentOffset = $(this).parent().offset(); 

        var relX = e.pageX - parentOffset.left;
 
        var barWidth = Math.ceil( (relX / 179) * 100 );
       

        $(this).children('.skillbar').css({
            width: barWidth+'%'
        });
        


    
        $(".skillbar-container").mouseleave(function() {
            if (editMode == true) {
              $(this).children('.skillbar').css({
                  width: Math.ceil(staticWidth * 10)+'%'
              });                
            }

        });        
    }


});


$(".skillbar-container").click(function(e) {
    if (editMode == true) {
        var parentOffset = $(this).parent().offset(); 
        var relX = e.pageX - parentOffset.left;
        var barWidth = Math.ceil( (relX / 179) * 100 );
        
        var childId = $(this).children('.skillbar').attr('id');
        
        $('input[data-list="'+childId+'"]').val(Math.ceil(barWidth / 10));  
        $('input[data-list="'+childId+'"]').trigger('change');
    }

});

$('.skill-delete').click(function() {
    if (editMode == true) {
        var id = $(this).attr('data-id');
        
        // delete row from table
        $(this).closest('.skill-tr').remove();
        
        // Ajax call to delete record
        deleteSkill(id);
    }
})


// AJAX function for changing skill ratings on the server 
function changeSkillRating(skillId, skillRating) {
    var skillData = {"action": "changeRating",  "id": skillId, "rating": skillRating};
    $.ajax({
        url:'skillAjax.php',
        method: 'POST',
        data: skillData,
    }).done(function(data){
        console.log(data);
    });
}

function deleteSkill(skillId) {
    var skillData = {"action": "deleteSkill",  "id": skillId};
    
    $.ajax({
        url:'skillAjax.php',
        method: 'POST',
        data: skillData,
    }).done(function(data){
        console.log(data);
    });
    
}