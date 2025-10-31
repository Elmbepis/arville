// Object creation functions for all booths with texture support

// Texture loader - will be initialized by hall.htm
let textureLoader = null;

// Initialize texture loader (call this from hall.htm after Three.js is loaded)
function initTextureLoader(loader) {
  textureLoader = loader;
  console.log("&#9989; Texture loader initialized");
}


// Helper function to create materials with texture support, high contrast, and lower brightness
function createTexturedMaterial(texturePath, defaultColor, textureRepeats = {x: 1, y: 1}) {
  if (texturePath && textureLoader) {
    try {
      const texture = textureLoader.load(
        texturePath,
        // onLoad callback
        function(texture) {
          console.log(`&#9989; Texture loaded: ${texturePath}`);
          texture.wrapS = THREE.RepeatWrapping;
          texture.wrapT = THREE.RepeatWrapping;
          texture.repeat.set(textureRepeats.x, textureRepeats.y);
        },
        // onProgress callback (optional)
        undefined,
        // onError callback
        function(err) {
          console.error(`&#10060; Failed to load texture: ${texturePath}`, err);
        }
      );
      
      return new THREE.MeshStandardMaterial({ 
        map: texture,
        roughness: 0.9,           // Higher roughness = more diffuse, less shine
        metalness: 0.0,           // No metalness = no reflections
        color: 0x7F7F7F,          // Medium gray to lower overall brightness (was white)
        emissive: 0x000000,       // No self-illumination
        emissiveIntensity: 0.0,
        
        // Contrast enhancement through material properties
        aoMapIntensity: 1.2,      // Enhanced ambient occlusion for contrast
        envMapIntensity: 0.3,     // Reduced environment influence
        
        // Tone mapping settings for better contrast
        toneMapped: true
      });
      
    } catch (error) {
      console.error(`&#10060; Error creating material for texture: ${texturePath}`, error);
    }
  }
  
  // Fallback to default color material with contrast adjustments
  return new THREE.MeshStandardMaterial({ 
    color: defaultColor,
    roughness: 0.9,
    metalness: 0.0,
    emissive: 0x000000,
    toneMapped: true
  });
}


// Corrected floor material function - remove the white color override
function createFloorMaterial(texturePath, defaultColor, textureRepeats = {x: 2, y: 2}) {
  if (texturePath && textureLoader) {
    try {
      const texture = textureLoader.load(texturePath);
      texture.wrapS = THREE.RepeatWrapping;
      texture.wrapT = THREE.RepeatWrapping;
      texture.repeat.set(textureRepeats.x, textureRepeats.y);
      
      // REMOVE the color property entirely to let the texture show through
      return new THREE.MeshLambertMaterial({ 
        map: texture
        // No color property - let the texture determine the color
      });
      
    } catch (error) {
      console.error(`&#10060; Failed to load floor texture: ${texturePath}`, error);
    }
  }
  
  // Fallback - use the default color only when no texture
  return new THREE.MeshLambertMaterial({ 
    color: defaultColor
  });
}


// Create billboard at specified position with customizable height, display area, and texture
function createBillboard(x = 0, y = 0, z = 0, totalHeight = 2.2, displayWidth = 3.2, displayHeight = 1.2, 
                        displayTexturePath = null, postTexturePath = null, 
                        displayTextureRepeats = {x: 1, y: 1}, postTextureRepeats = {x: 1, y: 1}) {
  const billboardGroup = new THREE.Group();
  billboardGroup.name = 'billboard';

  const postHeight = totalHeight;
  const billboardDisplayHeight = displayHeight;
  
  // FIXED: Position posts at the edges of the billboard, not beyond it
  const postSpacing = displayWidth; // Remove the extra 0.4 spacing
  const postOffset = displayWidth / 2; // Position posts at the exact edges

  // Post material - with texture if provided
  const postMaterial = createTexturedMaterial(postTexturePath, 0x8B4513, postTextureRepeats);

  // Billboard material - with texture if provided
  const billboardMaterial = createTexturedMaterial(displayTexturePath, 0x2E86AB, displayTextureRepeats);

  // Left post - positioned at left edge of billboard
  const leftPost = new THREE.Mesh(
    new THREE.CylinderGeometry(0.08, 0.08, postHeight, 16),
    postMaterial
  );
  leftPost.position.set(-postOffset, postHeight / 2, 0);

  // Right post - positioned at right edge of billboard
  const rightPost = leftPost.clone();
  rightPost.position.set(postOffset, postHeight / 2, 0);

  // Billboard frame
  const billboard = new THREE.Mesh(
    new THREE.BoxGeometry(displayWidth, billboardDisplayHeight, 0.1),
    billboardMaterial
  );
  billboard.position.set(0, postHeight - (billboardDisplayHeight / 2), 0.06);

  billboardGroup.add(leftPost, rightPost, billboard);
  billboardGroup.position.set(x, y, z);
  return billboardGroup;
}


// Create sign post with texture support
function createSignPost(x = 0, y = 0, z = 0, totalHeight = 1.8, displayWidth = 1.0, displayHeight = 0.5, 
                       signTexturePath = null, poleTexturePath = null,
                       signTextureRepeats = {x: 1, y: 1}, poleTextureRepeats = {x: 1, y: 1}) {
  const signPostGroup = new THREE.Group();
  signPostGroup.name = 'signpost';

  const poleHeight = totalHeight;
  const signDisplayHeight = displayHeight;
  const signDisplayWidth = displayWidth;

  // Pole material - with texture if provided
  const poleMaterial = createTexturedMaterial(poleTexturePath, 0x654321, poleTextureRepeats);

  // Sign material - with texture if provided
  const signMaterial = createTexturedMaterial(signTexturePath, 0xF18F01, signTextureRepeats);

  // Main pole
  const pole = new THREE.Mesh(
    new THREE.CylinderGeometry(0.05, 0.05, poleHeight, 16),
    poleMaterial
  );
  pole.position.y = poleHeight / 2;

  // Rectangular sign
  const sign = new THREE.Mesh(
    new THREE.BoxGeometry(signDisplayWidth, signDisplayHeight, 0.03),
    signMaterial
  );
  sign.position.set(0, poleHeight - (signDisplayHeight / 2), 0.05);

  signPostGroup.add(pole, sign);
  signPostGroup.position.set(x, y, z);
  return signPostGroup;
}

// Create table with texture support
function createTable(x = 0, y = 0, z = 0, 
                    tableTopTexturePath = null, legTexturePath = null,
                    tableTopTextureRepeats = {x: 2, y: 1}, legTextureRepeats = {x: 1, y: 1}) {
  const tableGroup = new THREE.Group();
  tableGroup.name = 'table';

  // Table top material - with texture if provided
  const tableTopMaterial = createTexturedMaterial(tableTopTexturePath, 0x8B4513, tableTopTextureRepeats);

  // Leg material - with texture if provided
  const legMaterial = createTexturedMaterial(legTexturePath, 0x654321, legTextureRepeats);

  // Table top
  const tableTop = new THREE.Mesh(
    new THREE.BoxGeometry(2, 0.05, 1),
    tableTopMaterial
  );
  tableTop.position.y = 0.8;

  // Table legs
  const legGeometry = new THREE.BoxGeometry(0.08, 0.8, 0.08);

  const leg1 = new THREE.Mesh(legGeometry, legMaterial);
  leg1.position.set(-0.9, 0.4, -0.4);

  const leg2 = new THREE.Mesh(legGeometry, legMaterial);
  leg2.position.set(0.9, 0.4, -0.4);

  const leg3 = new THREE.Mesh(legGeometry, legMaterial);
  leg3.position.set(-0.9, 0.4, 0.4);

  const leg4 = new THREE.Mesh(legGeometry, legMaterial);
  leg4.position.set(0.9, 0.4, 0.4);

  tableGroup.add(tableTop, leg1, leg2, leg3, leg4);
  tableGroup.position.set(x, y, z);
  return tableGroup;
}

// Create chair with texture support
function createChair(x = 0, y = 0, z = 0, rotationY = 0, 
                    seatTexturePath = null, backTexturePath = null, legTexturePath = null,
                    seatTextureRepeats = {x: 2, y: 2}, backTextureRepeats = {x: 2, y: 2}, legTextureRepeats = {x: 1, y: 1}) {
  const chairGroup = new THREE.Group();
  chairGroup.name = 'chair';

  // Seat material - with texture if provided
  const seatMaterial = createTexturedMaterial(seatTexturePath, 0x2E86AB, seatTextureRepeats);

  // Back material - with texture if provided
  const backMaterial = createTexturedMaterial(backTexturePath, 0x2E86AB, backTextureRepeats);

  // Leg material - with texture if provided
  const legMaterial = createTexturedMaterial(legTexturePath, 0x333333, legTextureRepeats);

  // Chair seat
  const seat = new THREE.Mesh(
    new THREE.BoxGeometry(0.6, 0.05, 0.6),
    seatMaterial
  );
  seat.position.y = 0.45;

  // Chair back
  const back = new THREE.Mesh(
    new THREE.BoxGeometry(0.6, 0.8, 0.05),
    backMaterial
  );
  back.position.set(0, 0.85, -0.275);

  // Chair legs
  const legGeometry = new THREE.CylinderGeometry(0.03, 0.03, 0.45, 8);

  const leg1 = new THREE.Mesh(legGeometry, legMaterial);
  leg1.position.set(-0.25, 0.225, -0.25);

  const leg2 = new THREE.Mesh(legGeometry, legMaterial);
  leg2.position.set(0.25, 0.225, -0.25);

  const leg3 = new THREE.Mesh(legGeometry, legMaterial);
  leg3.position.set(-0.25, 0.225, 0.25);

  const leg4 = new THREE.Mesh(legGeometry, legMaterial);
  leg4.position.set(0.25, 0.225, 0.25);

  chairGroup.add(seat, back, leg1, leg2, leg3, leg4);
  chairGroup.position.set(x, y, z);
  chairGroup.rotation.y = rotationY;
  return chairGroup;
}

// Create cubicle with texture support
function createCubicle(x = 0, y = 0, z = 0, size = 6, 
                      wallTexturePath = null, bannerTexturePath = null, poleTexturePath = null, floorTexturePath = null,
                      wallTextureRepeats = {x: 4, y: 2}, bannerTextureRepeats = {x: 1, y: 1}, 
                      poleTextureRepeats = {x: 1, y: 1}, floorTextureRepeats = {x: 2, y: 2}) {
  const cubicleGroup = new THREE.Group();
  cubicleGroup.name = 'cubicle';

  const halfSize = size / 2;
  const poleHeight = 2.5;
  const wallHeight = poleHeight;
  const poleRadius = 0.08;

  // Wall material - with texture if provided
  const wallMaterial = createTexturedMaterial(wallTexturePath, 0x2E86AB, wallTextureRepeats);

  // Pole material - with texture if provided
  const poleMaterial = createTexturedMaterial(poleTexturePath, 0x8B4513, poleTextureRepeats);

  // Floor material - with texture if provided
  const floorMaterial = createFloorMaterial(floorTexturePath, 0x666666, floorTextureRepeats);

  // Rope material
  const ropeMaterial = new THREE.MeshStandardMaterial({ color: 0xCCCCCC });

  // Banner material - with texture if provided
  let bannerMaterial;
  if (bannerTexturePath && textureLoader) {
    try {
      const texture = textureLoader.load(
        bannerTexturePath,
        // onLoad callback
        function(texture) {
          console.log(`&#9989; Banner texture loaded: ${bannerTexturePath}`);
          texture.wrapS = THREE.RepeatWrapping;
          texture.wrapT = THREE.RepeatWrapping;
          texture.repeat.set(bannerTextureRepeats.x, bannerTextureRepeats.y);
        },
        // onProgress callback (optional)
        undefined,
        // onError callback
        function(err) {
          console.error(`&#10060; Failed to load banner texture: ${bannerTexturePath}`, err);
        }
      );
      bannerMaterial = new THREE.MeshStandardMaterial({ 
        map: texture,
        emissive: 0x333333,
        emissiveIntensity: 0.1
      });
    } catch (error) {
      console.error(`&#10060; Error creating banner material: ${bannerTexturePath}`, error);
      bannerMaterial = new THREE.MeshStandardMaterial({ 
        color: 0x2E86AB,
        emissive: 0x2E86AB,
        emissiveIntensity: 0.2
      });
    }
  } else {
    bannerMaterial = new THREE.MeshStandardMaterial({ 
      color: 0x2E86AB,
      emissive: 0x2E86AB,
      emissiveIntensity: 0.2
    });
  }

  // Create 4 corner poles
  const poleGeometry = new THREE.CylinderGeometry(poleRadius, poleRadius, poleHeight, 16);

  const backLeftPole = new THREE.Mesh(poleGeometry, poleMaterial);
  backLeftPole.position.set(-halfSize, poleHeight / 2, -halfSize);

  const backRightPole = new THREE.Mesh(poleGeometry, poleMaterial);
  backRightPole.position.set(halfSize, poleHeight / 2, -halfSize);

  const frontLeftPole = new THREE.Mesh(poleGeometry, poleMaterial);
  frontLeftPole.position.set(-halfSize, poleHeight / 2, halfSize);

  const frontRightPole = new THREE.Mesh(poleGeometry, poleMaterial);
  frontRightPole.position.set(halfSize, poleHeight / 2, halfSize);

  // Create back wall
  const wallGeometry = new THREE.BoxGeometry(size, wallHeight, 0.1);
  const backWall = new THREE.Mesh(wallGeometry, wallMaterial);
  backWall.position.set(0, wallHeight / 2, -halfSize);

  // Create booth floor
  const floorGeometry = new THREE.PlaneGeometry(size, size);
  const boothFloor = new THREE.Mesh(floorGeometry, floorMaterial);
  boothFloor.rotation.x = -Math.PI / 2;
  boothFloor.position.y = 0.01;

  // Create front header/banner
  const bannerWidth = size;
  const bannerHeight = 0.6;
  const bannerGeometry = new THREE.BoxGeometry(bannerWidth, bannerHeight, 0.05);
  const banner = new THREE.Mesh(bannerGeometry, bannerMaterial);
  banner.position.set(0, poleHeight - bannerHeight/2, halfSize);

  // Create banner support ropes
  const ropeGeometry = new THREE.CylinderGeometry(0.01, 0.01, 0.3, 8);
  
  const leftRope = new THREE.Mesh(ropeGeometry, ropeMaterial);
  leftRope.position.set(-bannerWidth/2, poleHeight - 0.15, halfSize - 0.1);
  leftRope.rotation.z = Math.PI / 8;
  
  const rightRope = new THREE.Mesh(ropeGeometry, ropeMaterial);
  rightRope.position.set(bannerWidth/2, poleHeight - 0.15, halfSize - 0.1);
  rightRope.rotation.z = -Math.PI / 8;

  // Add all components to cubicle group
  cubicleGroup.add(
    backLeftPole, backRightPole, frontLeftPole, frontRightPole,
    backWall, boothFloor, banner, leftRope, rightRope
  );

  cubicleGroup.position.set(x, y, z);
  return cubicleGroup;
}

// Create simple display stand with texture support
function createDisplayStand(x = 0, y = 0, z = 0, 
                           platformTexturePath = null, poleTexturePath = null, baseTexturePath = null,
                           platformTextureRepeats = {x: 1, y: 1}, poleTextureRepeats = {x: 1, y: 1}, baseTextureRepeats = {x: 1, y: 1}) {
  const standGroup = new THREE.Group();
  standGroup.name = 'display-stand';

  // Platform material - with texture if provided
  const platformMaterial = createTexturedMaterial(platformTexturePath, 0x888888, platformTextureRepeats);

  // Pole material - with texture if provided
  const poleMaterial = createTexturedMaterial(poleTexturePath, 0x666666, poleTextureRepeats);

  // Base material - with texture if provided
  const baseMaterial = createTexturedMaterial(baseTexturePath, 0x333333, baseTextureRepeats);

  // Stand base
  const base = new THREE.Mesh(
    new THREE.CylinderGeometry(0.4, 0.3, 0.1, 16),
    baseMaterial
  );
  base.position.y = 0.05;

  // Stand pole
  const pole = new THREE.Mesh(
    new THREE.CylinderGeometry(0.05, 0.05, 1.2, 16),
    poleMaterial
  );
  pole.position.y = 0.7;

  // Display platform
  const platform = new THREE.Mesh(
    new THREE.CylinderGeometry(0.5, 0.5, 0.05, 16),
    platformMaterial
  );
  platform.position.y = 1.3;

  standGroup.add(base, pole, platform);
  standGroup.position.set(x, y, z);
  return standGroup;
}

// Create light fixture (standard height)
function createLightFixture(x = 0, y = 0, z = 0, 
                           poleTexturePath = null, fixtureTexturePath = null,
                           poleTextureRepeats = {x: 1, y: 1}, fixtureTextureRepeats = {x: 1, y: 1}) {
  const lightGroup = new THREE.Group();
  lightGroup.name = 'light-fixture';

  // Light pole material - with texture if provided
  const poleMaterial = createTexturedMaterial(poleTexturePath, 0xCCCCCC, poleTextureRepeats);

  // Light fixture material - with texture if provided
  const fixtureMaterial = createTexturedMaterial(fixtureTexturePath, 0xFFFFAA, fixtureTextureRepeats);
  fixtureMaterial.emissive = new THREE.Color(0xFFFFAA);
  fixtureMaterial.emissiveIntensity = 0.3;

  // Light pole
  const pole = new THREE.Mesh(
    new THREE.CylinderGeometry(0.03, 0.03, 2.5, 8),
    poleMaterial
  );
  pole.position.y = 1.25;

  // Light fixture
  const fixture = new THREE.Mesh(
    new THREE.BoxGeometry(0.3, 0.1, 0.3),
    fixtureMaterial
  );
  fixture.position.set(0, 2.4, 0);

  lightGroup.add(pole, fixture);
  lightGroup.position.set(x, y, z);
  return lightGroup;
}

// Create floor area with texture support
function createFloorArea(x = 0, y = 0, z = 0, width = 10, depth = 10, texturePath = null, textureRepeats = {x: 2, y: 2}) {
  const floorGroup = new THREE.Group();
  floorGroup.name = 'floor-area';

  // Floor material - with texture if provided
  const floorMaterial = createTexturedMaterial(texturePath, 0x666666, textureRepeats);

  const floor = new THREE.Mesh(
    new THREE.PlaneGeometry(width, depth),
    floorMaterial
  );
  floor.rotation.x = -Math.PI / 2;
  floor.position.y = y;

  floorGroup.add(floor);
  floorGroup.position.set(x, y, z);
  return floorGroup;
}

// Export the init function
window.initObjectTextures = initTextureLoader;

// Export all creation functions to global scope
window.ObjectCreator = {
  createBillboard,
  createSignPost,
  createTable,
  createChair,
  createCubicle,
  createDisplayStand,
  createLightFixture,
  createFloorArea,
  initTextureLoader
};